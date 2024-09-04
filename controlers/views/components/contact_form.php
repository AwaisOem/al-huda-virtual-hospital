<form id="contact-form" class="lg:w-1/3 md:w-1/2 bg-white flex flex-col md:ml-auto w-full md:py-8 mt-8 md:mt-0">
    <h2 class="text-gray-900 text-xl  mb-1 font-bold  title-font">Contact</h2>
    <p class="leading-relaxed mb-5 text-gray-600">Feel Free To Ask Anything or add Feedback, Complain, Testimonial</p>
    <div class="relative mb-4">
        <label for="name" class="leading-7 text-sm text-gray-600">Name</label>
        <input required type="text" id="name" name="contact-name" class="w-full bg-white rounded-lg border border-gray-300 focus:border-blue-500 focus:ring-2 focus:ring-blue-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
    </div>
    <div class="relative mb-4">
        <label for="email" class="leading-7 text-sm text-gray-600">Email</label>
        <input required type="email" id="email" name="contact-email" class="w-full bg-white rounded-lg border border-gray-300 focus:border-blue-500 focus:ring-2 focus:ring-blue-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
    </div>
    <div class="relative mb-4">
        <label for="message" class="leading-7 text-sm text-gray-600">Message</label>
        <textarea required id="message" name="contact-message" class="w-full bg-white rounded-lg border border-gray-300 focus:border-blue-500 focus:ring-2 focus:ring-blue-200 h-32 text-base outline-none text-gray-700 py-1 px-3 resize-none leading-6 transition-colors duration-200 ease-in-out" spellcheck="false" data-ms-editor="true"></textarea>
    </div>
    <button type="submit" class="py-3 px-4 rounded-lg bg-gradient-to-tr from-blue-600 to-blue-400 text-md uppercase shadow-md shadow-blue-500/20 transition-all hover:shadow-lg hover:shadow-blue-500/40 active:opacity-[0.85] disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none text-white w-full transition ease-in duration-200 text-center text-base font-bold">Send</button>
    <p class="text-xs text-gray-500 mt-3">Your messages through this section are only visible to admins.</p>
</form>
<script defer>
    $('#contact-form').submit((e)=>{
        e.preventDefault();
        let formData = new URLSearchParams();
        formData.append('name', $('[name=contact-name]').val());
        formData.append('email', $('[name=contact-email]').val());
        formData.append('message', $('[name=contact-message]').val());
        // Send POST request to api/contact.php
        $('#contact-form button[type="submit"]').attr('disabled', true);
        fetch('/api/contact.php', {
                    method: 'POST',
                    body: formData
                })
                .then(e=>{
                    if(!e.ok)
                    throw new Error(e.statusText);
                    showSuccessMessage("Feedback sent successfully");
                }).catch(err=>{
                    showErrorMessage(err.message);
                }).finally(()=>{
                    $('#contact-form button[type="submit"]').attr('disabled', false);
                })
        
        // $.ajax({
        //     url: '/contact',
        //     type: 'POST',
        //     data: formData,
        //     dataType: 'text',
        //     success(response) {
        //         console.log(response);
        //         // Handle the response data here
        //     },
        //     error(xhr, status, error) {
        //         console.error('An error occurred:', error);
        //         // Handle the error here
        //     }
        // });
        // var xhr = new XMLHttpRequest();
        // xhr.open('POST', '/contact');
        // xhr.onreadystatechange = function() {
        //     if (xhr.readyState === XMLHttpRequest.DONE) {
        //         if (xhr.status === 200) {
        //             console.log(xhr.responseText);
        //             // Handle the response data here
        //         } else {
        //             console.error('An error occurred:', xhr);
        //             // Handle the error here
        //         }
        //     }
        // };
        // xhr.send(formData);
    });
</script>