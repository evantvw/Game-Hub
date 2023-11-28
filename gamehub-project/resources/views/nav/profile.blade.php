@section('title','Profile')

<x-app-layout>
    <link rel="stylesheet" href="{{ asset('css/stylewithoutfooter.css') }}">
    <link rel="stylesheet" href="{{ asset('css/noscroll.css') }}">
    @include('nav.navigation')
    <div class="page_title color-white"></div>
    <div class="containerimg" id="card">
        <div class="photo">
            <img src="<?= asset('img/profile/' . $data['ppid'] . '.jpg') ?>" alt="profile">
        </div>


        <form action="" method="get">
            @csrf
            <div class="txt_field">
                <input type="text" name="name" id="name" value="{{ $data['fullname'] }}" readonly>
                <label for="name">Full Name</label>
            </div>

            <div class="txt_field">
                <input type="text" name="dob" id="dob" value="{{ $data['DOB'] }}" readonly>
                <label for="dob">Date of Birth</label>
            </div>

            <div class="txt_field">
                <input type="text" name="email" id="email" value="{{ $data['email'] }}" readonly>
                <label for="email">Email</label>
            </div>

            <div class="txt_field">
                <input type="text" name="phonenumber" id="phonenumber" value="{{ $data['phonenumber'] }}" readonly>
                <label for="phonenumber">Phone Number</label>
            </div>

            <div class="txt_field">
                <input type="text" name="gender" id="gender"  value="{{ $data['gender'] }}" readonly>
                <label for="gender">Gender</label>
            </div>

        </form>
        <div class="button-center">
            <button id="delete" class="button">Delete Account</button>
            <a href="profile_edit">
            <button id="update" class="button">
                    Update Profile
                </button>
            </a>
        </div>
    </div>

    <div class="modal" id="modals">
        <div class="modal_container" id="modal-container">
            <div class="modal_content">
                <div class="trash_logo">
                    <i class="fa-solid fa-trash"></i>
                </div>
                <div class="modal_title">
                    <h1>Are you sure you want to delete your account?</h1>
                </div>

                <div class="modal_desc">
                    <p>Once deleted, your data will be removed permanently and cannot be recovered!</p>
                </div>

                <button class="no">
                    No, go back
                </button>

                <button class="yes">
                    <a href="delete_account" style="text-decoration: none; color: #eee">
                        Yes, delete it
                    </a>
                </button>
            </div>
        </div>
    </div>

    <script>
        var modal = document.getElementById("modals");
        var btn = document.getElementById("delete");
        var close = document.getElementsByClassName("no")[0];
        var content = document.getElementById("modal-container");

        btn.onclick = function() {
          modal.style.display = "block";
          content.classList.add('open-modal');
        }

        close.onclick = function() {
          modal.style.display = "none";
        }

        window.onclick = function(event) {
          if (event.target == modal) {
            modal.style.display = "none";
          }
        }
    </script>
</x-app-layout>
