var skeletonId = 'skeleton';
var contentId = 'content';
var skipCounter = 0;
var takeAmount = 10;


function getRequests(mode) {
    // your code here...
    switch (mode) {
        case 'sent':
            $.ajax({
                    url: 'sentRequests',
                    type: 'GET',
                })
                .done(function(data) {
                    $("#skeleton").prop("hidden", true);
                    $("#received").prop("hidden", false);
                })
                .fail(function() {
                    console.log('Failed');
                });
            break;
        case 'received':
            $.ajax({
                    url: 'receivedRequests',
                    type: 'GET',
                })
                .done(function(data) {
                    $("#skeleton").prop("hidden", true);
                    $("#received").prop("hidden", false);
                })
                .fail(function() {
                    console.log('Failed');
                });
            break;
    }
}

function getMoreRequests(mode) {
    // Optional: Depends on how you handle the "Load more"-Functionality
    // your code here...
}

function getConnections() {
    $.ajax({
            url: '/connections',
            type: 'GET',
        })
        .done(function(data) {
            $("#skeleton").prop("hidden", true);
            $("#connections").prop("hidden", false);
        })
        .fail(function() {
            console.log('Failed');
        });
}

function getMoreConnections() {
    // Optional: Depends on how you handle the "Load more"-Functionality
    // your code here...
}

function getConnectionsInCommon(userId, connectionId) {
    $.ajax({
            url: '/connectionsInCommon',
            type: 'GET',
        })
        .done(function(data) {
            $("#skeleton").prop("hidden", true);
            $("#connections").prop("hidden", false);
        })
        .fail(function() {
            console.log('Failed');
        });
}

function getMoreConnectionsInCommon(userId, connectionId) {
    // Optional: Depends on how you handle the "Load more"-Functionality
    // your code here...
}

function getSuggestions() {
    $.ajax({
            url: '/suggestion',
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

function sendRequest(userId, suggestionId) {
    $.ajax({
            type: 'POST',
            url: '/sendRequest/',
            data: suggestionId,
        })
        .done(function(data) {
            $("#skeleton").prop("hidden", true);
            $("#suggestions").prop("hidden", false);
        })
        .fail(function() {
            console.log('Failed');
        });
}

function deleteRequest(userId, requestId) {
    $.ajax({
            type: 'DELETE',
            url: '/deleteRequest/',
            data: requestId,
        })
        .done(function(data) {
            $("#skeleton").prop("hidden", true);
            $("#sent").prop("hidden", false);
        })
        .fail(function() {
            console.log('Failed');
        });
}

function acceptRequest(userId, requestId) {
    $.ajax({
            type: 'PUT',
            url: '/acceptRequest/' + requestId + '/',
            data: requestId,
        })
        .done(function(data) {
            $("#skeleton").prop("hidden", true);
            $("#received").prop("hidden", false);
        })
        .fail(function() {
            console.log('Failed');
        });
}

function removeConnection(userId, connectionId) {
    $.ajax({
            type: 'PUT',
            url: '/removeConnection/' + connectionId + '/',
            data: connectionId,
        })
        .done(function(data) {
            $("#skeleton").prop("hidden", true);
            $("#connections").prop("hidden", false);
        })
        .fail(function() {
            console.log('Failed');
        });
}

$(function() {

    // Doc.Ready function (at the start)
    $("#suggestions").prop("hidden", true);
    $("#sent").prop("hidden", true);
    $("#received").prop("hidden", true);
    $("#connections").prop("hidden", true);
    getSuggestions();


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
        getRequests();
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