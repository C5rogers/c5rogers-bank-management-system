<x-layout2>
    <main>
        <x-formLayout>
            <fieldset>
                <legend><i><img src="{{ asset('image/bankDashbord/deposite.png') }}" alt=""></i></legend>
                <form action="{{ route('user.make.deposite',auth()->id()) }}" method="POST" id="form">
                    @csrf
                    @include('partisions._deposite')
                </form>
            </fieldset>
        </x-formLayout>
    </main>
</x-layout2>