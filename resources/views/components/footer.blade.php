<footer class="footer" id='contact'>
    <div class="container">
        <div class='row-auto'>
        @foreach ($contacts as $contact)
            <div class='col-4'>
                {{ $contact->address }}
            </div>
            <div class='col-4'>
                {{ $contact->gmail }}
            </div>
            <div class='col-4'>
                {{ $contact->phone_num }}
            </div>
        @endforeach
        </div>
    </div>
</footer>
