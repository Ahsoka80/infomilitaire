//Function Ajax pour le select des départements
function ajax_dep()
{
    let xmlhttp = new XMLHttpRequest();

    xmlhttp.onreadystatechange = function() {
        if (this.readyState === 4 && this.status === 200) {
            document.getElementById("div_dep").innerHTML = this.responseText;
        }
    };

    xmlhttp.open("GET", "../views/select_dep.php?id_region="+document.getElementById("region").value, true);
    xmlhttp.send();
}

//Function Ajax pour l'input de l'adresse
function  ajax_address()
{
    var input_address =  document.getElementById("address");
    if (typeof(input_address) == 'undefined' || input_address == null)
    {
        let xmlhttp = new XMLHttpRequest();

        xmlhttp.onreadystatechange = function() {
            if (this.readyState === 4 && this.status === 200) {
                document.getElementById("div_address").innerHTML = this.responseText;
            }
        };

        xmlhttp.open("GET", "../views/input_address.php", true);
        xmlhttp.send();
    }
}

//Function toggle comment 
// let btn = document.querySelector('toggleComment');
// let text = document.querySelector('.text');

// let isVisible = false;

// btn.addEventListener('click', () => {
//     isVisible = !isVisible;
//     isVisible ? text.classList.add('is-visible') : text.classList.remove('is-visible');
// });