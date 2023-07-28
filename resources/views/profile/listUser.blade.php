<x-app-layout>
    <div class="row mt-4">
        <div class="userList card">
            <img src="{{ asset('assets/img/alexander.jpg') }}" class="card-img-top" alt="...">
            <div class="card-body">
                <div class="text-section">
                    <h5 class="card-title">Kazi Masud Rana</h5>
                    <div>Section: Science</div>
                    <div><span>Session: 2000</span></div>
                    <div>Contact No.: 01715285632</div>

                </div>
                <div class="cta-section">
                    <a href="#" class="btn btn-primary">View</a>
                    <a href="#" class="btn btn-primary">Edit</a>
                </div>

            </div>
        </div>
    </div>


</x-app-layout>


<style>
    .userList.card {
        max-width: 35em;
        flex-direction: row;
        padding-left: 0em !important;
        padding-right: 0em !important;
    }

    .userList.card img {
        max-width: 30%;
        margin: auto;
        /* padding: 0.5em; */
        border-radius: 0.7em;
        border-top-right-radius: 0em;
        border-bottom-right-radius: 0em;
    }

    .userList>.card-body {
        display: flex;
        justify-content: space-between;
    }

    .text-section {
        max-width: 70%;
    }

    .cta-section {
        max-width: 30%;
        display: flex;
        flex-direction: column;
        align-items: flex-end;
        justify-content: center;
    }

    .userList>.cta-section .btn {
        /* padding: 0.3em 0.5em;
        background-color: #898989;
        border-color: #898989; */
    }
</style>
