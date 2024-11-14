jQuery(document).ready(function() {
    let arr = Joomla.getOptions('vars');
    let randomgreeting = document.getElementsByClassName('mod_randomgreeting');
    if (randomgreeting != null) {
        for (let i = 0; i < randomgreeting.length; i++) {
            randomgreeting[i].innerText = randomgreeting[i].innerText + arr['suffix'];
        }
    }
});

function count_users() {
    let nusers = event.target.parentElement.querySelector('span');
    Joomla.request({
        url: 'index.php?option=com_ajax&module=randomgreeting&method=count&format=json',
        method: 'GET',
        onSuccess(data) {
            const response = JSON.parse(data);
            if (response.success) {
                nusers.innerText = response.data;
                const confirmation = Joomla.Text._('MOD_RANDOMGREETING_AJAX_OK').replace('%s', response.data);
                Joomla.renderMessages({'info': [confirmation]});
            } else {
                const messages = {"error": [response.message]};
                Joomla.renderMessages(messages);
            }
        },
        onError(xhr) {
            Joomla.renderMessages(Joomla.ajaxErrorsMessages(xhr));
            const response = JSON.parse(xhr.response);
            Joomla.renderMessages({"error": [response.message]}, undefined, true);
        }
    });
}