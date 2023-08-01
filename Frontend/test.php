<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>PDF Generator Example</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/0.9.0rc1/jspdf.min.js"></script> <!-- Include the jsPDF library -->
</head>
<style>
    body {
  background: #ffdeaa;
  color: #3d3d3d;
  margin: 20px;
}

#imgCat {
  width: 25%;
}
</style>
<body>
    <h1>jsPDF Demo</h1>
    <p>This is a sample of how to use <a href="https://parall.ax/products/jspdf">jsPDF</a>.</p>
    <p> Write some text and donwload a pdf file with your content</p>


    <textarea id="txtContent" cols="60" rows="15"></textarea>
    <br />
    <button id="btnDownload"> Download PDF </button>
    <script>
        var content = document.getElementById('txtContent'),
            button = document.getElementById('btnDownload');

        function generatePDF() {
            var doc = new jsPDF();

            doc.setFontSize(14);
            doc.text(20, 20, content.value);
            //doc.text(35, 25, "Paranyan loves jsPDF");
            //doc.addImage(imgData, 'JPEG', 15, 40, 180, 160);
            doc.save('my.pdf');

        }

        button.addEventListener('click', generatePDF);
    </script>
</body>

</html>