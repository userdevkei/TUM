<div class="hero bg-white overflow-hidden">
    <div class="hero-inner">
        <div class="content content-full text-center">
            <div class="block block-rounded">
                <div class="block-header">
                    <h3 class="block-title"> Welcome {{ $applicant->email }} to {{ config('app.name') }}</h3>
                </div>
                <div class="block-content block-content-full">
                    <p>
                        Click <a href=" {{ route('application.emailverification', $applicant->VerifyEmail->verification_code) }}">this link </a> to verify your email.
                        To login to your username: {{ $applicant->email }}.
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
