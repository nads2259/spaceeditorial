import { Helmet } from 'react-helmet-async';

function TermsPage() {
  return (
    <>
      <Helmet>
        <title>Terms & Conditions | Space Editorial</title>
      </Helmet>
      <section className="my-12 space-y-6 rounded-3xl bg-white px-8 py-10 shadow-sm ring-1 ring-slate-100">
        <div>
          <h1 className="text-3xl font-semibold text-slate-900">Terms &amp; Conditions</h1>
          <p className="mt-2 text-sm text-slate-500">Please review these placeholder terms before replacing them with legal copy.</p>
        </div>

        <div className="space-y-5 text-sm leading-relaxed text-slate-700">
          <p>
            Your Space Editorial account grants access to curated orbital intelligence for informational purposes. Copy within this section is a
            placeholder template that product and legal teams can manage later from the CMS.
          </p>
          <p>
            By registering you agree to maintain the confidentiality of your credentials and to use the platform in accordance with applicable
            regulations. Analytics collected from your browsing activity help us tailor mission coverage and improve the product experience.
          </p>
          <p>
            Subscription and newsletter emails may include sponsorship or partner messages. You can update your preferences or close your account
            at any time by contacting our editorial operations team.
          </p>
        </div>
      </section>
    </>
  );
}

export default TermsPage;
