<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add</title>
    <link rel="stylesheet" href="public/assets/css/add.css">
</head>

<body>
    <div class="container">
        <form action="/add" method="post" enctype="multipart/form-data">
            <div class="info">
                <p class="date-added">2020-01-27</p>
                <div class="input__wrapper">
                    <input name="poster" type="file" name="file" id="input__file" class="input input__file" multiple>
                    <label for="input__file" class="input__file-button">
                        <span class="input__file-icon-wrapper"><img class="input__file-icon" src="public/assets/images/add.svg" alt="Выбрать файл" width="25"></span>
                        <span class="input__file-button-text">Загрузите постер</span>
                    </label>
                </div>
                <input type="text" name="title" placeholder="title">
                <input type="text" name="year" placeholder="year">
                <input type="text" name="genre" placeholder="genre">
                <textarea name="description" maxlength="210" placeholder="description"></textarea>
                <button class="btn" type="submit">add</button>
            </div>
        </form>
    </div>
<!--  JS FOR INPUT FILE(VENDOR)  -->
    <script>
    let inputs = document.querySelectorAll('.input__file');
    Array.prototype.forEach.call(inputs, function (input) {
      let label = input.nextElementSibling,
        labelVal = label.querySelector('.input__file-button-text').innerText;
  
      input.addEventListener('change', function (e) {
        let countFiles = '';
        if (this.files && this.files.length >= 1)
          countFiles = this.files.length;
  
        if (countFiles)
          label.querySelector('.input__file-button-text').innerText = 'Выбрано файлов: ' + countFiles;
        else
          label.querySelector('.input__file-button-text').innerText = labelVal;
      });
    });
</script>
</body></html>