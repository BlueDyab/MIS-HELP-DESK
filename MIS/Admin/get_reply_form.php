<?php
// Fetch the inquiry ID from POST data
$inquiryId = $_POST['id'];

// Here you can fetch additional data from the database if needed

// Assuming you have a form for replying to inquiries
$form = "
    <form id='replyForm'>
        <!-- Form fields for reply -->
        <input type='hidden' name='inquiryId' value='$inquiryId'>
        <input type='email' name='email' placeholder='Email'>
        <textarea name='replyMessage' placeholder='Reply Message'></textarea>
        <button type='submit'>Send Reply</button>
    </form>
";

// Return the form content
echo $form;
?>