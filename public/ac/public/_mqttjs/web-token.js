// v 2.4 Called when the ac nyala button is pressed
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

    host = "165.22.50.101";
    port = "1883";
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
        userName: 'test',
        password: '12345'
    });
    
}

// Called when the client connects
function onConnect() {
    // Fetch the MQTT topic from the form
    topic = "lampu7";

    // Print output for the user in the messages div
    document.getElementById("messages").innerHTML = '<span>Subscribing to: ' + topic + '</span><br/>';
    console.log("konek ke server IoT");
    // Subscribe to the requested topic and publish message
    client.subscribe("lampu7");
    // client.subscribe("Cikunir/lt2/cmd/fan");
    //client.subscribe("Cikunir/lt2/stts/suhu");
    console.log("berhasil konek");
    
}

// Called when the client loses its connection
function onConnectionLost(responseObject) {
    document.getElementById("messages").innerHTML = '<span>ERROR: Connection lost</span><br/>';
    if (responseObject.errorCode !== 0) {
        document.getElementById("messages").innerHTML = '<span>ERROR: ' + + responseObject.errorMessage + '</span><br/>';
    }

}
''
function powerMeter(message)
{
    message.destinationName = "tele/WorkshopThreePhase/SENSOR";
	let data = message.payloadString
	console.log(data)
}

function startACNyala(){
    message = new Paho.MQTT.Message("1");
    message.destinationName = "Cikunir/lt2/cmd/power";
    client.send(message);
}

function startACMati(){
    message = new Paho.MQTT.Message("2");
    message.destinationName = "Cikunir/lt2/cmd/power";
    client.send(message);
}
function naik() {
    startPerubahanSuhu(setSuhu+1);
}
function turun() {
    startPerubahanSuhu(setSuhu-1);
}

//Called when suhu is changed
function startPerubahanSuhu(suhu){
    switch(suhu){
        case 16:
            console.log("16 hallo");
            message = new Paho.MQTT.Message("16");
            message.destinationName = "Cikunir/lt2/cmd/suhu";
            client.send(message);
            break;
        case 17:
            console.log("17");
            message = new Paho.MQTT.Message("17");
            message.destinationName = "Cikunir/lt2/cmd/suhu";
            client.send(message);
            break;
        case 18:
            console.log("Suhu AC menjadi 18");
            message = new Paho.MQTT.Message("18");
            message.destinationName = "Cikunir/lt2/cmd/suhu";
            client.send(message);
            break;
        case 19:
            console.log("Suhu AC menjadi 19");
            message = new Paho.MQTT.Message("19");
            message.destinationName = "Cikunir/lt2/cmd/suhu";
            client.send(message);
            break;
        case 20:
            console.log("Suhu AC menjadi 20");
            message = new Paho.MQTT.Message("20");
            message.destinationName = "Cikunir/lt2/cmd/suhu";
            client.send(message);
            break;
        case 21:
            console.log("Suhu AC menjadi 21");
            message = new Paho.MQTT.Message("21");
            message.destinationName = "Cikunir/lt2/cmd/suhu";
            client.send(message);
            break;
        case 22:
            console.log("Suhu AC menjadi 22");
            message = new Paho.MQTT.Message("22");
            message.destinationName = "Cikunir/lt2/cmd/suhu";
            client.send(message);
            break;
        case 23:
            console.log("Suhu AC menjadi 23");
            message = new Paho.MQTT.Message("23");
            message.destinationName = "Cikunir/lt2/cmd/suhu";
            client.send(message);
            break;
        case 24:
            console.log("Suhu AC menjadi 24");
            message = new Paho.MQTT.Message("24");
            message.destinationName = "Cikunir/lt2/cmd/suhu";
            client.send(message);
            break;
        case 25:
            console.log("Suhu AC menjadi 25");
            message = new Paho.MQTT.Message("25");
            message.destinationName = "Cikunir/lt2/cmd/suhu";
            client.send(message);
            break;
        default:
            console.log(suhu);
            // message = new Paho.MQTT.Message("Suhu AC tidak terdeteksi");
            // message.destinationName = "Cikunir/lt2/cmd/suhu";
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

// Called when a message arrives
function onMessageArrived(message) {
    // console.log("onMessageArrived: " + message.payloadString);
    document.getElementById("messages").innerHTML = '<span>Topic: ' + message.destinationName + '  | ' + message.payloadString + '</span><br/>';
    if (message.destinationName == "tele/WorkshopThreePhase/SENSOR") {
        console.log('data suhu masuk');
        let data = JSON.parse(message.payloadString);
        console.log(data["ENERGY"]);

		power1 = data["ENERGY"]["Power"][0];
		power2 = data["ENERGY"]["Power"][1];
		power3 = data["ENERGY"]["Power"][2];

		voltage1 = data["ENERGY"]["Voltage"][0];
		voltage2 = data["ENERGY"]["Voltage"][1];
		voltage3 = data["ENERGY"]["Voltage"][2];

		current1 = data["ENERGY"]["Current"][0];
		current2 = data["ENERGY"]["Current"][1];
		current3 = data["ENERGY"]["Current"][2];

		reactive1 = data["ENERGY"]["ReactivePower"][0];
		reactive2 = data["ENERGY"]["ReactivePower"][1];
		reactive3 = data["ENERGY"]["ReactivePower"][2];

		apparent1 = data["ENERGY"]["ApparentPower"][0];
		apparent2 = data["ENERGY"]["ApparentPower"][1];
		apparent3 = data["ENERGY"]["ApparentPower"][2];

		energyToday = data["ENERGY"]["Today"];
		energyTotal = data["ENERGY"]["Total"];
        
		document.getElementById("power1").innerHTML = power1;
        document.getElementById("power2").innerHTML = power2;
        document.getElementById("power3").innerHTML = power3;

        document.getElementById("voltage1").innerHTML = voltage1;
        document.getElementById("voltage2").innerHTML = voltage2;
        document.getElementById("voltage3").innerHTML = voltage3;

		document.getElementById("current1").innerHTML = current1;
        document.getElementById("current2").innerHTML = current2;
        document.getElementById("current3").innerHTML = current3;

		document.getElementById("reactive1").innerHTML = reactive1;
        document.getElementById("reactive2").innerHTML = reactive2;
        document.getElementById("reactive3").innerHTML = reactive3;

		document.getElementById("apparent1").innerHTML = apparent1;
        document.getElementById("apparent2").innerHTML = apparent2;
        document.getElementById("apparent3").innerHTML = apparent3;

        document.getElementById("EnergyToday").innerHTML = energyToday;
        document.getElementById("EnergyTotal").innerHTML = energyTotal;

    }else if (message.destinationName == "tele/WorkshopThreePhase/SENSOR") {
        // document.getElementById("suhu_AC").innerHTML = suhu;
        // console.log("data suhu masuk");
        // let data = message.payloadString;
        // let obj = JSON.parse(data);
        // console.log(data);
        // console.log(obj.ANALOG.A0);
        // document.getElementById("V_Accu").innerHTML = obj.ANALOG.A0;
    }

    else if (message.destinationName == "Cikunir/lt2/cmd/fan") {
        // document.getElementById("fan_AC").innerHTML = fan;
    }
    else if(message.destinationName=="test1/ALARM"){
    //   var tabel =document.getElementById("myTable"); 
    //   var row = table.inserRow(1);
      console.log('incoming data');
      let data =message.payloadString;
      console.log(data);
      parkAlarm = data;
      document.getElementById("parkAlarm").innerHTML = parkAlarm;     
    }
}

// Called when the disconnection button is pressed
function startDisconnect() {
    client.disconnect();
    document.getElementById("messages").innerHTML = '<span>Disconnected</span><br/>';
}
