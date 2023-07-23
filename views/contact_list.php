<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contacts</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <link href="../recources/css/style.css" rel="stylesheet">

</head>
<body>
    <div class="container d-flex justify-content-center align-items-center">
        <div class="p_block">
            <div class="add_contacts_block p-0">
                <div class="header_block p-3">
                    <p class="label_text m-0">Добавить контакт</p>
                </div>
                <div class="form_block p-3">
                    <div class="mb-3">
                        <input type="text" class="form-control required" id="name" placeholder="Имя">
                    </div>
                    <div class="mb-3">
                        <input type="text" class="form-control required" id="phone" placeholder="Телефон">
                    </div>
                    <div class="submit_btn_blocl text-end mt-3">
                        <button type="button" class="btn btn-primary send_btn">Добавить</button>

                    </div>
                </div>
            </div>
            <div class="show_contacts_block mt-3">
                <div class="header_block p-3">
                    <p class="label_text m-0">Список контактов</p>
                </div>
                <div class="contact_lists">
                    <?php foreach ($contact_list as $contact) :?>
                        <div class="current_contact p-3">
                            <p class="label_text m-0"><?=$contact['name'] ?><sup class ="del_contact_btn" data-id = "<?=$contact['id'] ?>">  X</sup></p>
                            <p class="phone_text m-0"><?= $contact['phone']?></p>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
        

    </div>
    <script
        src="https://code.jquery.com/jquery-3.7.0.min.js"
        integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g="
        crossorigin="anonymous">
    </script>
    <script src="../recources/js/script.js"></script>
</body>
</html>