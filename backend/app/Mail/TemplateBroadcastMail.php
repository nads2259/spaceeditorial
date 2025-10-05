<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class TemplateBroadcastMail extends Mailable
{
    use Queueable;
    use SerializesModels;

    public function __construct(
        public string $subjectLine,
        public string $htmlBody,
        public ?string $textBody = null
    ) {
    }

    public function build(): self
    {
        $this->subject($this->subjectLine);

        if ($this->textBody) {
            $this->text('emails.broadcast_plain', ['body' => $this->textBody]);
        } else {
            $this->text('emails.broadcast_plain', ['body' => strip_tags($this->htmlBody)]);
        }

        return $this->html($this->htmlBody);
    }
}
