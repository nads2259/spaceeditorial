<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\ExternalSource;
use App\Models\Post;
use App\Models\Subcategory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;
use Illuminate\View\View;

class PostController extends Controller
{
    public function index(): View
    {
        $posts = Post::query()
            ->with(['category:id,name,slug', 'subcategory:id,name,slug', 'externalSource:id,name'])
            ->orderByDesc('published_at')
            ->paginate(20);

        return view('admin.posts.index', compact('posts'));
    }

    public function create(): View
    {
        return view('admin.posts.create', [
            'post' => new Post([
                'published_at' => now(),
                'is_published' => true,
            ]),
            'categories' => $this->categoryOptions(),
            'subcategories' => $this->subcategoryOptions(),
            'sources' => $this->sourceOptions(),
        ]);
    }

    public function store(Request $request): RedirectResponse
    {
        $data = $this->validatedData($request);

        Post::query()->create($data);

        return redirect()->route('admin.posts.index')->with('status', 'Post created');
    }

    public function show(Post $post): View
    {
        $post->load(['category', 'subcategory', 'externalSource']);

        return view('admin.posts.show', compact('post'));
    }

    public function edit(Post $post): View
    {
        return view('admin.posts.edit', [
            'post' => $post,
            'categories' => $this->categoryOptions(),
            'subcategories' => $this->subcategoryOptions(),
            'sources' => $this->sourceOptions(),
        ]);
    }

    public function update(Request $request, Post $post): RedirectResponse
    {
        $data = $this->validatedData($request, $post);

        $post->update($data);

        return redirect()->route('admin.posts.edit', $post)->with('status', 'Post updated');
    }

    public function destroy(Post $post): RedirectResponse
    {
        $post->delete();

        return redirect()->route('admin.posts.index')->with('status', 'Post deleted');
    }

    public function bulkDestroy(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'ids' => ['required', 'array'],
            'ids.*' => ['integer', 'exists:posts,id'],
        ]);

        Post::query()->whereIn('id', $validated['ids'])->delete();

        return redirect()->route('admin.posts.index')->with('status', 'Selected posts deleted');
    }

    protected function validatedData(Request $request, ?Post $post = null): array
    {
        $postId = $post?->id;

        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'slug' => ['nullable', 'string', 'max:255', 'unique:posts,slug,'.($postId ?? 'NULL').',id'],
            'category_id' => ['required', 'exists:categories,id'],
            'subcategory_id' => ['nullable', 'exists:subcategories,id'],
            'external_source_id' => ['nullable', 'exists:external_sources,id'],
            'external_id' => ['nullable', 'string', 'max:255'],
            'excerpt' => ['nullable', 'string'],
            'body' => ['required', 'string'],
            'image_path' => ['nullable', 'string', 'max:255'],
            'original_url' => ['nullable', 'url', 'max:255'],
            'is_published' => ['nullable', 'boolean'],
            'published_at' => ['nullable', 'date'],
            'meta' => ['nullable', 'string'],
        ]);

        if ($validated['subcategory_id'] ?? null) {
            $subcategory = Subcategory::query()->find($validated['subcategory_id']);
            if ($subcategory && $subcategory->category_id !== (int) $validated['category_id']) {
                abort(422, 'Selected subcategory does not belong to the chosen category.');
            }
        }

        $meta = [];
        if (filled($validated['meta'] ?? null)) {
            $decoded = json_decode($validated['meta'], true);
            if (json_last_error() !== JSON_ERROR_NONE || ! is_array($decoded)) {
                abort(422, 'Meta must be valid JSON.');
            }
            $meta = $decoded;
        }

        $slug = $validated['slug'] ?? null;
        $slug = $slug ? Str::slug($slug) : Str::slug(Str::limit($validated['title'], 60, ''));

        $publishedAt = $validated['published_at'] ?? null;
        $publishedAt = $publishedAt ? Carbon::parse($publishedAt) : now();

        $payload = $validated;
        $payload['slug'] = $slug;
        $payload['published_at'] = $publishedAt;
        $payload['is_published'] = (bool) ($validated['is_published'] ?? false);
        $payload['meta'] = array_merge($meta, ['has_full_content' => true]);

        $payload['content_hash'] = hash('sha256', implode('|', [
            $payload['original_url'] ?? '',
            $payload['title'],
            Str::limit(strip_tags($payload['body']), 120),
        ]));

        if (($payload['external_source_id'] ?? null) && empty($payload['external_id'])) {
            $payload['external_id'] = Str::uuid()->toString();
        }

        return $payload;
    }

    protected function categoryOptions()
    {
        return Category::query()->orderBy('name')->get(['id', 'name']);
    }

    protected function subcategoryOptions()
    {
        return Subcategory::query()->orderBy('name')->get(['id', 'name', 'category_id']);
    }

    protected function sourceOptions()
    {
        return ExternalSource::query()->orderBy('name')->get(['id', 'name']);
    }
}
