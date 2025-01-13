// v 2.6 Called when the ac nyala button is pressed
var setSuhu = 25;


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
    // document.getElementById("defaultOpen").click();
    // Generate a random client ID
    clientID = "client_ind" + parseInt(Math.random() * 100);


    // Fetch the hostname/IP address and port number from the form
    // host = document.getElementById("host").value;
    // port = document.getElementById("port").value;

    host = "104.248.156.51";
    port = "9001";
    // Print output for the user in the messages div
    // document.getElementById("messages").innerHTML += '<span>Connecting to: ' + host + ' on port: ' + port + '</span><br/>';
    // document.getElementById("messages").innerHTML += '<span>Using the following client value: ' + clientID + '</span><br/>';

    // Initialize new Paho client connection
    
    client = new Paho.MQTT.Client(host, Number(port), clientID);

    // Set callback handlers
    client.onConnectionLost = onConnectionLost;
    client.onMessageArrived = onMessageArrived;

    // Connect the client, if successful, call onConnect function
    client.connect({ 
        onSuccess: onConnect,
        userName: 'ali',
        password: '1234'
    });
    
}

// Called when the client connects
function onConnect() {
    // Fetch the MQTT topic from the form
    topic = "/cmd";

    // Print output for the user in the messages div
    document.getElementById("messages").innerHTML = '<span>Subscribing to: ' + topic + '</span><br/>';
    console.log("disini");
    // Subscribe to the requested topic and publish message
    client.subscribe("Cikunir/lt2/cmd/sharp/power");
    client.subscribe("Cikunir/lt2/cmd/suhu/sharp");
    // client.subscribe("Cikunir/lt2/cmd/fan");
    client.subscribe("Cikunir/lt2/stts/suhu/sharp");
    client.subscribe("Cikunir/lt2/stts/current");
    // Subscribe to the requested topic and publish message
    client.subscribe("Cikunir/lt2/cmd/panasonic/power");
    client.subscribe("Cikunir/lt2/cmd/suhu/panasonic");
    // client.subscribe("Cikunir/lt2/cmd/fan");
    client.subscribe("Cikunir/lt2/stts/suhu/panasonic");
    client.subscribe("Cikunir/lt2/stts/current/panasonic");
    
    console.log("berhasil konek");
    
}

// Called when the client loses its connection
function onConnectionLost(responseObject) {
    document.getElementById("messages").innerHTML = '<span>ERROR: Connection lost</span><br/>';
    if (responseObject.errorCode !== 0) {
        document.getElementById("messages").innerHTML = '<span>ERROR: ' + + responseObject.errorMessage + '</span><br/>';
    }
}

function startACNyala(cmd){
    switch(cmd){
        case 1:
            message = new Paho.MQTT.Message("1");
            message.destinationName = "Cikunir/lt2/cmd/sharp/power";
            client.send(message);
            console.log("sharp")
            break;
        case 2:
            message = new Paho.MQTT.Message("1");
            message.destinationName = "Cikunir/lt2/cmd/panasonic/power";
            client.send(message);
            console.log("panasonic")
            default:
                break;
    }
        
    
    
     
}

function startACMati(cmd){
    switch(cmd){
        case 1: 
           message = new Paho.MQTT.Message("2");
           message.destinationName = "Cikunir/lt2/cmd/sharp/power";
           client.send(message);
           break;
        case 2:
            message = new Paho.MQTT.Message("2");
            message.destinationName = "Cikunir/lt2/cmd/panasonic/power";
            client.send(message);
            default:
                break;
    }

     
}
function naik(cmd) {
    switch(cmd){
        case 1:
            startPerubahanSuhu_sharp(setSuhu+1);
            break;
        case 2:
            startPerubahanSuhu_pana(setSuhu+1);
            default:
                break;

    }

}
function turun(cmd) {
    switch(cmd){
        case 1:
            startPerubahanSuhu_sharp(setSuhu-1);
            break;
        case 2:
            startPerubahanSuhu_pana(setSuhu-1);
            default:
                break;
    }
    
}

//Called when suhu is changed
function startPerubahanSuhu_sharp(suhu){
    let topic_sharp = "Cikunir/lt2/cmd/suhu/sharp"
    switch(suhu){
        case 16:
            console.log("16 hallo");
            message = new Paho.MQTT.Message("16");
            message.destinationName = topic_sharp;
            client.send(message);
            break;
        case 17:
            console.log("17");
            message = new Paho.MQTT.Message("17");
            message.destinationName = topic_sharp;
            client.send(message);
            break;
        case 18:
            console.log("Suhu AC menjadi 18");
            message = new Paho.MQTT.Message("18");
            message.destinationName = topic_sharp;
            client.send(message);
            break;
        case 19:
            console.log("Suhu AC menjadi 19");
            message = new Paho.MQTT.Message("19");
            message.destinationName = topic_sharp;
            client.send(message);
            break;
        case 20:
            console.log("Suhu AC menjadi 20");
            message = new Paho.MQTT.Message("20");
            message.destinationName = topic_sharp;
            client.send(message);
            break;
        case 21:
            console.log("Suhu AC menjadi 21");
            message = new Paho.MQTT.Message("21");
            message.destinationName = topic_sharp;
            client.send(message);
            break;
        case 22:
            console.log("Suhu AC menjadi 22");
            message = new Paho.MQTT.Message("22");
            message.destinationName = topic_sharp;
            client.send(message);
            break;
        case 23:
            console.log("Suhu AC menjadi 23");
            message = new Paho.MQTT.Message("23");
            message.destinationName = topic_sharp;
            client.send(message);
            break;
        case 24:
            console.log("Suhu AC menjadi 24");
            message = new Paho.MQTT.Message("24");
            message.destinationName = topic_sharp;
            client.send(message);
            break;
        case 25:
            console.log("Suhu AC menjadi 25");
            message = new Paho.MQTT.Message("25");
            message.destinationName = topic_sharp;
            client.send(message);
            break;
        default:
            console.log(suhu);
            // message = new Paho.MQTT.Message("Suhu AC tidak terdeteksi");
            // message.destinationName = topic_sharp;
            // client.send(message);
            window.alert("suhu diluar rentang!");
            break;
    } 
}
    function startPerubahanSuhu_pana(suhu){
        let topic_pana  = "Cikunir/lt2/cmd/suhu/panasonic"
        switch(suhu){

        case 17:
            console.log("17");
            message = new Paho.MQTT.Message("17");
            message.destinationName = topic_pana;
            client.send(message);
            break;
        case 18:
            console.log("Suhu AC menjadi 18");
            message = new Paho.MQTT.Message("18");
            message.destinationName = topic_pana;
            client.send(message);
            break;
        case 19:
            console.log("Suhu AC menjadi 19");
            message = new Paho.MQTT.Message("19");
            message.destinationName = topic_pana;
            client.send(message);
            break;
        case 20:
            console.log("Suhu AC menjadi 20");
            message = new Paho.MQTT.Message("20");
            message.destinationName = topic_pana;
            client.send(message);
            break;
        case 21:
            console.log("Suhu AC menjadi 21");
            message = new Paho.MQTT.Message("21");
            message.destinationName = topic_pana;
            client.send(message);
            break;
        case 22:
            console.log("Suhu AC menjadi 22");
            message = new Paho.MQTT.Message("22");
            message.destinationName = topic_pana;
            client.send(message);
            break;
        case 23:
            console.log("Suhu AC menjadi 23");
            message = new Paho.MQTT.Message("23");
            message.destinationName = topic_pana;
            client.send(message);
            break;
        case 24:
            console.log("Suhu AC menjadi 24");
            message = new Paho.MQTT.Message("24");
            message.destinationName = topic_pana;
            client.send(message);
            break;
        case 25:
            console.log("Suhu AC menjadi 25");
            message = new Paho.MQTT.Message("25");
            message.destinationName = topic_pana;
            client.send(message);
            break;
        default:
            console.log(suhu);
            // message = new Paho.MQTT.Message("Suhu AC tidak terdeteksi");
            // message.destinationName = topic_sharp;
            // client.send(message);
            window.alert("suhu diluar rentang!");
            break;
    }
}

//Called when fan is changed
function startPerubahanFan(fan){
    switch(fan){
        case 1:
            console.log("Fan AC menjadi 1");
            message = new Paho.MQTT.Message("Fan AC menjadi 1");
            message.destinationName = "AC/IF/Fan";
            client.send(message);
            break;
        case 2:
            console.log("Fan AC menjadi 2");
            message = new Paho.MQTT.Message("Fan AC menjadi 2");
            message.destinationName = "AC/IF/Fan";
            client.send(message);
            break;
        case 3:
            console.log("Fan AC menjadi 3");
            message = new Paho.MQTT.Message("Fan AC menjadi 3");
            message.destinationName = "AC/IF/Fan";
            client.send(message);
            break;
        default:
            console.log("Fan AC tidak terdeteksi");
            message = new Paho.MQTT.Message("Fan AC tidak terdeteksi");
            message.destinationName = "AC/IF/Fan";
            client.send(message);
            break;
    }
   
}

//Called when fan is changed
function startPerubahanFan(fan){
    switch(fan){
        case 1:
            console.log("Fan AC menjadi 1");
            message = new Paho.MQTT.Message("Fan AC menjadi 1");
            message.destinationName = "AC/IF/Fan";
            client.send(message);
            break;
        case 2:
            console.log("Fan AC menjadi 2");
            message = new Paho.MQTT.Message("Fan AC menjadi 2");
            message.destinationName = "AC/IF/Fan";
            client.send(message);
            break;
        case 3:
            console.log("Fan AC menjadi 3");
            message = new Paho.MQTT.Message("Fan AC menjadi 3");
            message.destinationName = "AC/IF/Fan";
            client.send(message);
            break;
        default:
            console.log("Fan AC tidak terdeteksi");
            message = new Paho.MQTT.Message("Fan AC tidak terdeteksi");
            message.destinationName = "AC/IF/Fan";
            client.send(message);
            break;
    }
    
}

// Called when a message arrives
function onMessageArrived(message) {
    console.log("onMessageArrived: " + message.payloadString);
    console.log("topic: " + message.destinationName);
    // document.getElementById("messages").innerHTML = '<span>Topic: ' + message.destinationName + '  | ' + message.payloadString + '</span><br/>';
    if (message.destinationName == "Cikunir/lt2/stts/suhu/sharp") {
        console.log('data suhu masuk');
        let data = message.payloadString;
        console.log(data);
        setSuhu = parseInt(message.payloadString);
        
        document.getElementById("setsuhu_sharp").innerHTML = setSuhu;
    }

    else if (message.destinationName == "Cikunir/lt2/stts/current") {
        // document.getElementById("suhu_AC").innerHTML = suhu;
        console.log("data suhu masuk");
        let data = message.payloadString;
        let obj = JSON.parse(data);
        console.log(obj.temp);
        document.getElementById("temp_sharp").innerHTML = obj.suhu;
        
    }
    if (message.destinationName == "Cikunir/lt2/stts/suhu/panasonic") {
        console.log('data suhu masuk');
        let data = message.payloadString;
        console.log(data);
        setSuhu = parseInt(message.payloadString);
        
        document.getElementById("setsuhu_pana").innerHTML = setSuhu;
        
    }
    else if (message.destinationName == "Cikunir/lt2/stts/current") {
        // document.getElementById("suhu_AC").innerHTML = suhu;
        console.log("data suhu masuk");
        let data = message.payloadString;
        let obj = JSON.parse(data);
        console.log(obj.temp);
        document.getElementById("temp_pana").innerHTML = obj.suhu;
        
    }
    else if (message.destinationName == "Cikunir/lt2/cmd/fan") {
        // document.getElementById("fan_AC").innerHTML = fan;
    }
}

// Called when the disconnection button is pressed
function startDisconnect() {
    client.disconnect();
    document.getElementById("messages").innerHTML = '<span>Disconnected</span><br/>';
}




