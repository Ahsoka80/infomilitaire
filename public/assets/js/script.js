/*let btnZip = document.getElementById('btnZip');
const getCode = () => {
    studentsElement.innerHTML = ``;
    // je récupère dans le dossier où se trouve mes scripts ajax le fichier :
    fetch('controllers/ajax/getCode.php')
        // pour le récupérer dans le front le .then attend une fonction flèchée :
        // je le stocke dans response :
        .then(response => {
            console.log(response)
            // je récupère juste le contenu en json:
            return (response.json())
        })
        // je l'affiche avec data:
        .then(students => {
            let zipCodeElement = document.getElementById('zipCodeElement');
            zipCodes.array.forEach(zipCode => {
                zipCodeElement.innerHTML += `<li>${zipcode}</li>`;
            });
            
        })
}
btnZip.addEventListener('click', getCode);
*/
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