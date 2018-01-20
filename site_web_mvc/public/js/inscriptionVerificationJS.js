<!DOCTYPE html>
<html>
<head>
  <title>Verification java script </title>
  <meta charset="utf-8">


</head>
<body>
<form method="POST">
  <tr>
    <table>
                  <td align="right">
                     <label for="login">Login :</label>
                  </td>
                  <td>
                     <input type="text"  id="login" name="login" maxlength="20"  style="width:200px"  required>
                     <span id="misslogin"></span>

                  </td>
               </tr>
               <tr>
                  <td align="right">
                     <label for="mdp">Password :</label>
                  </td>
                  <td>
                     <input type="password"  id="mdp" name="mdp" style="width:200px" required />
                  </td>
               </tr>
               <tr>
                  <td align="right">
                     <label for="mdp2">Password (Repeat) :</label>
                  </td>
                  <td>
                     <input type="password"  id="mdp2" name="mdp2" style="width:200px" required />
                  </td>
               </tr>

                  <td></td>
                  <td align="center">
                     <br />
                     <input type="submit" name="forminscription" value="Valider" id="bouton_envoi"/>
                  </td>
               </tr>

</table>
        </form>
        <script>
            var formValid = document.getElementById('bouton_envoi');
            var prenom = document.getElementById('login');
            var missPrenom = document.getElementById('misslogin');
             var prenomValid = /^[a-zA-ZéèîïÉÈÎÏ][a-zéèêàçîï]+([-'\s][a-zA-ZéèîïÉÈÎÏ][a-zéèêàçîï]+)?$/;


            formValid.addEventListener('click', validation);

            function validation(event){
                //Si le champ est vide
                if (login.validity.valueMissing){
                    event.preventDefault();
                    misslogin.textContent = 'login manquant';
                    misslogin.style.color = 'red';
                }else if (loginValid.test(login.value) == false){
                    event.preventDefault();
                    missPrenom.textContent = 'Format incorrect';
                    misslogin.style.color = 'orange';
                }else{
                }
            }
          </script>
</body>
</html>
