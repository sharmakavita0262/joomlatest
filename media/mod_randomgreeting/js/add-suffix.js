jQuery(document).ready(function() {
    let arr = Joomla.getOptions('vars');
    let randomgreeting = document.getElementsByClassName('mod_randomgreeting');
    if (randomgreeting != null) {
        for (let i = 0; i < randomgreeting.length; i++) {
            randomgreeting[i].innerText = randomgreeting[i].innerText + arr['suffix'];
        }
    }
});