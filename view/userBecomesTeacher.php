<form action="index.php" method="POST" enctype="multipart/form-data">
    <p>Become a teacher</p><br>
    <input name="action" value="submitCert" type="hidden">
    <input type="file" accept="application/pdf" id="pdf" name="pdfCert">
    <label class="buttons" id="sendPdf" for="pdf">Upload a certificate (PDF)</label>
    <input class="buttons" type="submit" name="submitCert" value="Submit for verification">
</form>