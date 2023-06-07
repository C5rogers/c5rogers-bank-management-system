<x-layout2>
    <main>
        @include('partisions._back')
        <x-formLayout>
            <fieldset>
                <legend><i><img src="{{ asset('image/payment/school.png') }}" alt=""></i></legend>
                <form action="/user/{{ auth()->id() }}/pay/{{ $company->id }}" method="POST" id="form">
                    @csrf
                    @include('partisions._payment._formInputs')
                </form>
            </fieldset>    
        </x-formLayout>
    </main>
</x-layout2>