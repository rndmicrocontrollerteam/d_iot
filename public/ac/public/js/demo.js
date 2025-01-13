function openCity(evt, cityName) {
    let i, content, tablinks;
    content = document.getElementsByClassName("content");
    for (i = 0; i < content.length; i++) {
        content[i].style.display = "none";
    }
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
    }
    document.getElementById(cityName).style.display = "block";
    evt.currentTarget.className += " active";
}


function startConnect() {
    clientID = "client_ind" + parseInt(Math.random() * 100);
    host = "104.248.156.51";
    port = "9001";
    client = new Paho.MQTT.Client(host, Number(port), clientID);
    client.onConnectionLost = onConnectionLost;
    client.onMessageArrived = onMessageArrived;

    client.connect({
        onSuccess: onConnect,
        userName: 'ali',
        password: '1234'
    });

}

function onConnect() {
    topic = "power/token";

    document.getElementById("trash-message").innerHTML = '<span>Subscribing to: ' + topic + '</span><br/>';
    console.log("disini");

    console.log("berhasil konek");

}

function onConnectionLost(responseObject) {
    document.getElementById("messages").innerHTML = '<span>ERROR: Connection lost</span><br/>';
    if (responseObject.errorCode !== 0) {
        document.getElementById("messages").innerHTML = '<span>ERROR: ' + +responseObject.errorMessage +
            '</span><br/>';
    }
}

function onMessageArrived(message) {
    console.log("onMessageArrived: " + message.payloadString);
    console.log("topic: " + message.destinationName);
    // document.getElementById("messages").innerHTML = '<span>Topic: ' + message.destinationName + '  | ' + message.payloadString + '</span><br/>';
    if (message.destinationName == "/power/token") {
        console.log('data suhu masuk');
        let data = message.payloadString;
        console.log(data);
        setSuhu = parseInt(message.payloadString);

        document.getElementById("setsuhu_sharp").innerHTML = setSuhu;
    }
}

function startDisconnect() {
    client.disconnect();
    document.getElementById("messages").innerHTML = '<span>Disconnected</span><br/>';
}

function autoTabs(field1, length, field2) {
    if ($('#' + field1).length == length) {
        $('#' + field2).focus();
    }
}