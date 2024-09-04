<script src="../../node_modules/@material-tailwind/html/scripts/tabs.js"></script>
<script defer>
    function isValidUrl(urlString) {
        try {
            return Boolean(new URL(urlString));
        } catch (e) {
            return false;
        }
    }

    function showErrorMessage(errorMessage) {
        Swal.fire({
            icon: 'error',
            title: 'OOPS!',
            text: errorMessage,
            footer: "try again",
            confirmButtonColor: '#3C79F1'
        })
    }
    function showSuccessMessage(msg) {
        Swal.fire({
                icon: "success",
                title: msg,
                showConfirmButton: true,
                confirmButtonText: 'Ok',
                confirmButtonColor: '#3C79F1'
            })
    }

    // login logic 
    $('#menuVertical').hide();
    $('#hamburger').click(() => {
        $('#menuVertical').toggle(10, () => {
            if ($("#hamicn").hasClass("fa-bars")) {
                $("#hamicn").removeClass("fa-bars").addClass("fa-xmark");
            } else {
                $("#hamicn").removeClass("fa-xmark").addClass("fa-bars");
            }
        });
    });


    //  end login logic

    // start dashboard logic
    $('#ham').click(function() {
        $('.navbar').toggleClass('hidden');
        $('.navbar').toggleClass('flex');
        if ($("#hamicon").hasClass("fa-bars")) {
            $("#hamicon").removeClass("fa-bars").addClass("fa-xmark");
        } else {
            $("#hamicon").removeClass("fa-xmark").addClass("fa-bars");
        }
    });
    $('#main-section').click(function() {
        if (!$('.navbar').hasClass('hidden'))
            $('.navbar').addClass('hidden');
        if ($("#hamicon").hasClass("fa-xmark")) {
            $("#hamicon").removeClass("fa-xmark").addClass("fa-bars");
        }
    });
    // end dashboard logic
</script>
</body>

</html>