var skeletonId = 'skeleton';
var contentId = 'content';
var skipCounter = 0;
var takeAmount = 10;


function getRequests(mode) {
    switch (mode) {
        case 'sent':
            $.ajax({
                    url: '/getSentRequests',
                    type: 'GET',
                })
                .done(function(data) {
                    $("#skeleton").prop("hidden", true);
                    $("#sent").prop("hidden", false);
                })
                .fail(function() {
                    console.log('Failed');
                });
            break;
        case 'received':

            break;
    }
}

function getMoreRequests(mode) {
    // Optional: Depends on how you handle the "Load more"-Functionality
    // your code here...
}

function getConnections() {
    // your code here...
}

function getMoreConnections() {
    // Optional: Depends on how you handle the "Load more"-Functionality
    // your code here...
}

function getConnectionsInCommon(userId, connectionId) {
    // your code here...
}

function getMoreConnectionsInCommon(userId, connectionId) {
    // Optional: Depends on how you handle the "Load more"-Functionality
    // your code here...
}

function getSuggestions() {
    $.ajax({
            url: '/getSuggestions',
            type: 'GET',
        })
        .done(function(data) {
            $("#skeleton").prop("hidden", true);
            $("#suggestions").prop("hidden", false);
        })
        .fail(function() {
            console.log('Failed');
        });
}

function getMoreSuggestions() {
    // Optional: Depends on how you handle the "Load more"-Functionality
    // your code here...
}

function sendRequest(suggestionId) {
    $("#value_create_request").val(suggestionId);
    $("#form_create_request_" + suggestionId).submit();
}

function deleteRequest(userId, requestId) {
    // your code here...
}

function acceptRequest(userId, requestId) {
    // your code here...
}

function removeConnection(userId, connectionId) {
    // your code here...
}

$(function() {
    // Doc.Ready function (at the start)
    $("#suggestions").prop("hidden", true);
    $("#sent").prop("hidden", true);
    $("#received").prop("hidden", true);
    $("#connections").prop("hidden", true);
    getSuggestions();

    $('#create_request_btn_').on('click', function(e) {
        sendRequest();
    });

    // Show containers depending on corresponding button.
    $('#btnradio1').on('click', function(e) {
        $("#suggestions").prop("hidden", true);
        $("#sent").prop("hidden", true);
        $("#received").prop("hidden", true);
        $("#connections").prop("hidden", true);
        $("#skeleton").prop("hidden", false);
        getSuggestions();
    });
    $('#btnradio2').on('click', function(e) {
        $("#suggestions").prop("hidden", true);
        $("#sent").prop("hidden", true);
        $("#received").prop("hidden", true);
        $("#connections").prop("hidden", true);
        $("#skeleton").prop("hidden", false);
        getRequests('sent');
    });
    $('#btnradio3').on('click', function(e) {
        $("#suggestions").prop("hidden", true);
        $("#sent").prop("hidden", true);
        $("#received").prop("hidden", false);
        $("#connections").prop("hidden", true);
    });
    $('#btnradio4').on('click', function(e) {
        $("#suggestions").prop("hidden", true);
        $("#sent").prop("hidden", true);
        $("#received").prop("hidden", true);
        $("#connections").prop("hidden", false);
    });
});