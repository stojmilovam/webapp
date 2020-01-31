<!DOCTYPE html>
<html>

<head>
    <title>Креирај оглас</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <!---------------------mesto na ziveenje------------------>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="includes/countrystate.js"></script>
    <link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet" />
    <style>
    h1 {
        font-size: 20px;
        margin-top: 24px;
        margin-bottom: 24px;
    }
    </style>
</head>

<body>
    <div class="col-md-6 offset-md-3 mt-5">
        <?php session_start();
        
        if(!isset($_SESSION['user']) || empty($_SESSION['user']))
        { 
          ?>
        <p class="lead">
            За да можете да креирате оглас, <a href="login.php"> логирајте се.</a>
        </p>

        <?php
      
        }
        else 
        {
          ?>

        <form accept-charset="UTF-8" action="insert_user.php" method="POST" enctype="multipart/form-data"
            target="_blank">
            <div class="form-group">
                <label>На вдомување се дава:</label>
                <select class="form-control input-md" name="zivotno" required="required" id="zivotno">
                    <option value="mace">Маче</option>
                    <option value="kuce">Куче</option>
                </select>
            </div>

            <div class="form-group" style="display: none;">
                <label id="element">Раст</label>
                <select class="form-control input-md" name="pol" required="required" id="rast">
                    <option value="mal">Мал</option>
                    <option value="sreden">Среден</option>
                    <option value="golem">Голем</option>
                </select>
            </div>

            <script>
            const selects = document.querySelectorAll("select");
            const [zivotno, rast] = selects;
            const element = document.getElementById("element");

            function handleSelectInput() {
                debugger;
                if (this.id === "zivotno") {
                    if ((this.value = "kuce")) {
                        rast.parentElement.style.display = "block";
                    }
                } else {
                    if (this.value === "mace") {
                        element.style.display = "none";
                        rast.style.display = "none";
                    }
                }
            }

            selects.forEach(select =>
                select.addEventListener("input", handleSelectInput)
            );
            </script>

            <div class="form-group">
                <label>Пол</label>
                <select class="form-control input-md" name="pol" required="required">
                    <option selected disabled>Селектирај пол</option>
                    <option value="m">Машки</option>
                    <option value="z">Женски</option>
                </select>
            </div>
            <div class="form-group">
                <label>Возраст</label>
                <select class="form-control input-md" name="vozrast" required="required">
                    <option selected disabled>Селектирај возраст на животното</option>
                    <option value="0">Помало од 6 месеци</option>
                    <option value="1">Од 6 месеци до 1 година</option>
                    <option value="2">Од 1 година до 3 години</option>
                    <option value="3">Над 3 години</option>
                </select>
            </div>
            <hr />
            <div class="form-group">
                <div class="row">
                    <div class="col-6 offset-2">
                        <input class="form-check-input" type="checkbox" value="1" name="vakcinirano"
                            id="defaultCheck1" />
                        <label class="form-check-label" for="defaultCheck1">
                            Вакцинирано
                        </label>
                    </div>
                    <div class="col-4">
                        <input class="form-check-input" type="checkbox" value="2" name="chipirano" id="defaultCheck2" />
                        <label class="form-check-label" for="defaultCheck2">
                            Чипирано
                        </label>
                    </div>
                </div>
            </div>

            <hr />
            <div class="form-group mt-3">
                <label class="mr-2">Прикачи слика:</label>
                <input type="file" name="slika" required="required" />
            </div>
            <hr />
            <div class="form-group">
                <label for="exampleInputName">Опис </label>
                <textarea name="opis" class="col-12" rows="3" placeholder="Внесете краток опис за животното"
                    required="required"></textarea>
            </div>
            <div class="form-group">
                <label for="exampleFormControlSelect1">Место</label>
                <div class="row">
                    <div class="col-6">
                        <select class="form-control countries order-alpha" id="countryId" name="country"
                            required="required">
                            <option selected disabled value="">Држава</option>
                        </select>
                    </div>
                    <div class="col-6">
                        <select class="form-control states order-alpha" id="stateId" name="state" required="required">
                            <option selected disabled value="">Општина</option>
                        </select>
                    </div>
                </div>

            </div>
            <button name="oglas" type="submit" class="btn btn-primary">
                Креирај оглас
            </button>
        </form>

        <?php
        }
        ?>
    </div>
</body>

</html>