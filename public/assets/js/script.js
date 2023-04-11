let btnZip = document.getElementById('btnZip');
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