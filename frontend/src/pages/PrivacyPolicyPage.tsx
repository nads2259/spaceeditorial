import { Helmet } from 'react-helmet-async';

function PrivacyPolicyPage() {
  return (
    <>
      <Helmet>
        <title>Privacy Policy | Space Editorial</title>
      </Helmet>
      <section className="my-12 space-y-6 rounded-3xl bg-white px-8 py-10 shadow-sm ring-1 ring-slate-100">
        <div>
          <h1 className="text-3xl font-semibold text-slate-900">Privacy Policy</h1>
          <p className="mt-2 text-sm text-slate-500">Last updated: {new Date().getFullYear()}</p>
        </div>

        <div className="space-y-5 text-sm leading-relaxed text-slate-700">
          <p>
            Space Editorial collects only the information required to deliver personalised mission briefings and understand how our readers engage
            with launch intelligence. This placeholder policy can be replaced with CMS-driven content once the legal copy is ready.
          </p>
          <p>
            Registered accounts store your name, email address, hashed password, and interaction history. Newsletter subscriptions are kept in a
            dedicated dataset to manage cadence and opt-outs. Visit and click analytics are mapped to anonymised visitor identifiers and, when you
            are logged in, to your frontend user profile.
          </p>
          <p>
            You can request deletion of your profile or unsubscribe at any time by contacting the editorial desk. Cookies may be used to maintain
            session continuity and improve experience analytics. We do not sell your data to third parties.
          </p>
        </div>
      </section>
    </>
  );
}

export default PrivacyPolicyPage;
