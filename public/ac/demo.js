// v 2.6 Called when the ac nyala button is pressed
var setSuhu = 25;
var setFan = 0;
var setMode = 0;
var setSwing = 0;
var status_lampu = 1;
var status_lampuu = 1;
var FAN = document.getElementById("fan");
var Mode = document.getElementById("mode");
var Swing = document.getElementById("swing");

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
    client.subscribe("cmnd/lampu_pintu/POWER2");
    client.subscribe("cmnd/lampu_pintu/POWER1");
    client.subscribe("stat/lampu_pintu/POWER1");
    client.subscribe("stat/lampu_pintu/POWER2");
    client.subscribe("tele/lampu_pintu/STATE");
    // Subscribe to the requested topic and publish message
    client.subscribe("Cikunir/lt2/sharp2/power");
    client.subscribe("Cikunir/lt2/suhu2/sharp");
    // client.subscribe("Cikunir/lt2/cmd/fan");
    client.subscribe("Cikunir/lt2/stts2/sharp");
    client.subscribe("Cikunir/lt2/stts2/fan/sharp");
    client.subscribe("Cikunir/lt2/stts2/current");
    // Subscribe to the requested topic and publish message
    client.subscribe("Cikunir/lt2/cmd/panasonic/power");
    client.subscribe("Cikunir/lt2/cmd/suhu2/panasonic");
    // client.subscribe("Cikunir/lt2/cmd/fan");
    client.subscribe("Cikunir/lt2/stts/suhu2/panasonic");
    client.subscribe("Cikunir/lt2/stts2/current/panasonic");
    client.subscribe("Cikunir/lt2/cmd/gip/power");
    client.subscribe("Cikunir/lt2/cmd/suhu2/gip");
    // client.subscribe("Cikunir/lt2/cmd/fan");
    client.subscribe("Cikunir/lt2/stts/suhu2/sharp");
    client.subscribe("Cikunir/lt2/stts2/current/gip");
    client.subscribe("Cikunir/lt2/stts2/xfan/sharp");
    client.subscribe("Cikunir/lt2/stts2/fan/sharp");
    client.subscribe("Cikunir/lt2/stts2/turbo/sharp");
    client.subscribe("Cikunir/lt2/stts2/swing/sharp");
    client.subscribe("Cikunir/lt2/stts2/mode/sharp");



    console.log("berhasil konek");

}

// Called when the client loses its connection
function onConnectionLost(responseObject) {
    document.getElementById("messages").innerHTML = '<span>ERROR: Connection lost</span><br/>';
    console.log("ERROR")
    if (responseObject.errorCode !== 0) {
        document.getElementById("messages").innerHTML = '<span>ERROR: ' + +responseObject.errorMessage + '</span><br/>';
    }
}


function lampu2() {
    console.log(status_lampuu);
    if (status_lampuu == 1) {
        message = new Paho.MQTT.Message("0");
        message.destinationName = "cmnd/lampu_pintu/POWER2";
        client.send(message);

        console.log(status_lampuu);
    } else if (status_lampuu == 0) {
        message = new Paho.MQTT.Message("1");
        message.destinationName = "cmnd/lampu_pintu/POWER2";
        client.send(message);

    }



}

function lampu1() {
    console.log(status_lampu);
    if (status_lampu == 1) {
        message = new Paho.MQTT.Message("0");
        message.destinationName = "cmnd/lampu_pintu/POWER1";
        client.send(message);

    } else if (status_lampu == 0) {
        message = new Paho.MQTT.Message("1");
        message.destinationName = "cmnd/lampu_pintu/POWER1";
        client.send(message);

    }



}

function startACNyala(cmd) {
    switch (cmd) {
        case 1:
            message = new Paho.MQTT.Message("1");
            message.destinationName = "Cikunir/lt2/suhu2/sharp";
            client.send(message);
            console.log("sharp")
            break;
        case 2:
            message = new Paho.MQTT.Message("1");
            message.destinationName = "Cikunir/lt2/cmd/gip/power";
            client.send(message);
            console.log("panasonic")
        default:
            break;
    }

}

function x_fan() {
    message = new Paho.MQTT.Message("44");
    message.destinationName = "Cikunir/lt2/suhu2/sharp";
    client.send(message);
}

function turbo() {
    message = new Paho.MQTT.Message("45");
    message.destinationName = "Cikunir/lt2/suhu2/sharp";
    client.send(message);
}

function startACMati(cmd) {
    switch (cmd) {
        case 1:
            message = new Paho.MQTT.Message("2");
            message.destinationName = "Cikunir/lt2/suhu2/sharp";
            client.send(message);
            break;
        case 2:
            message = new Paho.MQTT.Message("2");
            message.destinationName = "Cikunir/lt2/cmd/gip/power";
            client.send(message);
        default:
            break;
    }


}

function changeMode(cmd) {
    switch (cmd) {
        case 1:
            startPerubahanMode_sharp(setMode + 1);
            break;
        case 2:
            startPerubahanSuhu_pana(setSuhu + 1);
        default:
            break;

    }

}

function changeSwing(cmd) {
    switch (cmd) {
        case 1:
            startPerubahanSwing_sharp(setSwing + 1);
            break;
        case 2:
            startPerubahanSuhu_pana(setSuhu + 1);
        default:
            break;

    }

}

function naikFAN(cmd) {
    switch (cmd) {
        case 1:
            startPerubahanFan_sharp(setFan + 1);
            break;
        case 2:
            startPerubahanSuhu_pana(setSuhu + 1);
        default:
            break;

    }

}

function turunFAN(cmd) {
    switch (cmd) {
        case 1:
            startPerubahanFan_sharp(setFan - 1);
            break;
        case 2:
            startPerubahanSuhu_pana(setSuhu - 1);
        default:
            break;
    }

}

function naik(cmd) {
    switch (cmd) {
        case 1:
            startPerubahanSuhu_sharp(setSuhu + 1);
            break;
        case 2:
            startPerubahanSuhu_pana(setSuhu + 1);
        default:
            break;

    }

}

function turun(cmd) {
    switch (cmd) {
        case 1:
            startPerubahanSuhu_sharp(setSuhu - 1);
            break;
        case 2:
            startPerubahanSuhu_pana(setSuhu - 1);
        default:
            break;
    }

}

//Called when suhu is changed
function startPerubahanSuhu_sharp(suhu) {
    let topic_sharp = "Cikunir/lt2/suhu2/sharp"
    switch (suhu) {
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

function startPerubahanSuhu_pana(suhu) {
    let topic_pana = "Cikunir/lt2/cmd/suhu2/gip"
    switch (suhu) {
        case 16:
            console.log("16");
            message = new Paho.MQTT.Message("16");
            message.destinationName = topic_pana;
            client.send(message);
            break;
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
function startPerubahanFan_sharp(fan) {
    let topic_sharp = "Cikunir/lt2/suhu2/sharp"
    switch (fan) {
        case 1:
            console.log("Fan AC menjadi 1");
            message = new Paho.MQTT.Message("31");
            message.destinationName = topic_sharp;
            client.send(message);
            FAN.classList.remove("fad");
            FAN.classList.remove("fa-signal-slash");
            FAN.classList.remove("fad");
            FAN.classList.remove("fa-signal-2");
            FAN.classList.add("fad");
            FAN.classList.add("fa-signal-1");
            FAN.innerHTML = "";
            break;
        case 2:
            console.log("Fan AC menjadi 2");
            message = new Paho.MQTT.Message("32");
            message.destinationName = topic_sharp;
            client.send(message);
            FAN.classList.remove("fad");
            FAN.classList.remove("fa-signal-1");
            FAN.classList.remove("fad");
            FAN.classList.remove("fa-signal-alt");
            FAN.classList.add("fad");
            FAN.classList.add("fa-signal-2");
            FAN.innerHTML = "";
            break;
        case 3:
            console.log("Fan AC menjadi 3");
            message = new Paho.MQTT.Message("33");
            message.destinationName = topic_sharp;
            client.send(message);
            FAN.classList.remove("fad");
            FAN.classList.remove("fa-signal-2");
            FAN.classList.add("fad");
            FAN.classList.add("fa-signal-alt");
            FAN.innerHTML = "";
            break;
        case 4:
            console.log("Fan AC Auto");
            message = new Paho.MQTT.Message("34");
            message.destinationName = topic_sharp;
            client.send(message);
            FAN.classList.remove("fad");
            FAN.classList.remove("fa-signal-alt");
            FAN.innerHTML = "Auto";
            break;
        default:
            console.log("Fan AC tidak terdeteksi");
            window.alert("Fan diluar rentang!");
            break;
    }

}

function startPerubahanSwing_sharp(swing) {
    let topic_sharp = "Cikunir/lt2/suhu2/sharp"
    switch (swing) {
        case 1:
            console.log("Swing AC menjadi 1");
            message = new Paho.MQTT.Message("35");
            message.destinationName = topic_sharp;
            client.send(message);
            Swing.classList.remove("fas");
            Swing.classList.remove("fa-wind");
            Swing.innerHTML = "Auto";
            break;
        case 2:
            console.log("Swing AC menjadi 2");
            message = new Paho.MQTT.Message("36");
            message.destinationName = topic_sharp;
            client.send(message);
            Swing.innerHTML = "UP";
            break;
        case 3:
            console.log("Swing AC menjadi 3");
            message = new Paho.MQTT.Message("37");
            message.destinationName = topic_sharp;
            client.send(message);
            Swing.innerHTML = "Normal";
            break;
        case 4:
            console.log("Swing AC Auto");
            message = new Paho.MQTT.Message("34");
            message.destinationName = topic_sharp;
            client.send(message);
            Swing.innerHTML = "Down";
            setSwing = 0;
            break;
        default:
            console.log("Swing AC tidak terdeteksi");
            window.alert("Swing diluar rentang!");
            break;
    }

}

function startPerubahanMode_sharp(mode) {
    let topic_sharp = "Cikunir/lt2/suhu2/sharp"
    switch (mode) {
        case 1:
            console.log("Mode AC Dry");
            message = new Paho.MQTT.Message("39");
            message.destinationName = topic_sharp;
            client.send(message);
            Mode.classList.remove("fad");
            Mode.classList.remove("fa-snowflake");
            Mode.classList.remove("fad");
            Mode.classList.remove("fa-fan");
            Mode.classList.add("fad");
            Mode.classList.add("fa-tint");
            Mode.innerHTML = "";
            break;
        case 2:
            console.log("Mode AC Fan");
            message = new Paho.MQTT.Message("40");
            message.destinationName = topic_sharp;
            client.send(message);
            Mode.classList.remove("fad");
            Mode.classList.remove("fa-tint");
            Mode.classList.remove("fad");
            Mode.classList.remove("fa-temprature-hot");
            Mode.classList.add("fad");
            Mode.classList.add("fa-fan");
            Mode.innerHTML = "";
            break;
        case 3:
            console.log("Mode AC Heat");
            message = new Paho.MQTT.Message("41");
            message.destinationName = topic_sharp;
            client.send(message);
            Mode.classList.remove("fad");
            Mode.classList.remove("fa-fan");
            Mode.classList.add("fad");
            Mode.classList.add("fa-temperature-hot");
            Mode.innerHTML = "";
            break;
        case 4:
            console.log("Mode AC Auto");
            message = new Paho.MQTT.Message("42");
            message.destinationName = topic_sharp;
            client.send(message);
            Mode.classList.remove("fad");
            Mode.classList.remove("fa-temperature-hot");
            Mode.classList.remove("fad");
            Mode.classList.remove("fa-snowflake");
            Mode.innerHTML = "Auto";
            break;
        case 5:
            console.log("Mode AC Cool");
            message = new Paho.MQTT.Message("43");
            message.destinationName = topic_sharp;
            client.send(message);
            Mode.classList.add("fad")
            Mode.classList.add("fa-snowflake")
            Mode.innerHTML = "";
            break;
        default:
            console.log("Mode AC tidak terdeteksi");
            window.alert("Mode diluar rentang!");
            break;
    }

}
// Called when a message arrives
function onMessageArrived(message) {
    console.log("onMessageArrived: " + message.payloadString);
    console.log("topic: " + message.destinationName);
    // document.getElementById("messages").innerHTML = '<span>Topic: ' + message.destinationName + '  | ' + message.payloadString + '</span><br/>';
    if (message.destinationName == "Cikunir/lt2/stts2/sharp") {
        console.log('data suhu masuk');
        let data = message.payloadString;
        console.log(data);
        setSuhu = parseInt(message.payloadString);
        document.getElementById("setsuhu_sharp").innerHTML = setSuhu;
        if (setSuhu == 2) {
            document.getElementById("setsuhu_sharp").innerHTML = "OFF";
        }
    } else if (message.destinationName == "Cikunir/lt2/stts2/mode/sharp") {
        console.log('ganti mode');
        let data = message.payloadString;
        console.log(data);
        setMode = parseInt(message.payloadString);
        if (setMode == 5) {
            console.log("mode terakhir")
            setMode = 0;
        }
    } else if (message.destinationName == "Cikunir/lt2/stts2/fan/sharp") {
        console.log('data fan masuk');
        let data = message.payloadString;
        console.log(data);
        setFan = parseInt(message.payloadString);
    } else if (message.destinationName == "Cikunir/lt2/stts2/swing/sharp") {
        console.log('ganti swing');
        let data = message.payloadString;
        console.log(data);
        setSwing = parseInt(message.payloadString);
    } else if (message.destinationName == "Cikunir/lt2/stts2/turbo/sharp") {
        console.log('mode turbo');
        let data = message.payloadString;
        console.log(data);
        document.getElementById("setsuhu_sharp").innerHTML = data;

    } else if (message.destinationName == "Cikunir/lt2/stts/suhu2/sharp") {
        // document.getElementById("suhu_AC").innerHTML = suhu;
        console.log("data suhu masuk");
        let data = message.payloadString;
        let obj = JSON.parse(data);
        console.log(obj.temp);
        document.getElementById("temp_sharp").innerHTML = obj.suhu;
        document.querySelector('.percent').style = "--clr: #fff;--num:" + obj.suhu;
    } else if (message.destinationName == "stat/lampu_pintu/POWER1") {
        let data = message.payloadString;
        console.log(data);
        if (data == "ON") {
            status_lampu = 1;
        } else if (data == "OFF") {
            status_lampu = 0;
        }
    } else if (message.destinationName == "stat/lampu_pintu/POWER2") {
        let data = message.payloadString;
        console.log(data);
        if (data == "ON") {
            status_lampuu = 1;
        } else if (data == "OFF") {
            status_lampuu = 0;
        }

    } else if (message.destinationName == "tele/lampu_pintu/STATE") {

        let data = message.payloadString;
        let obj = JSON.parse(data);
        console.log("power1 : ", obj.POWER1);
        console.log("power2 : ", obj.POWER2);
        var ttt = 0B00000000;
        let buff = obj.POWER1 == "ON";

        ttt = write(ttt, 0, buff);
        let buff2 = obj.POWER2 == "ON";
        ttt = write(ttt, 1, buff2);
        console.log("buff", buff, buff2, ttt);
        switch (ttt) {
            case 0:
                console.log("lampu mati keduanya");
                document.getElementById("myImg").src = "OFF.jpg";
                break;
            case 1:
                console.log("lampu 1 nyala");
                document.getElementById("myImg").src = "lampu2OFF.jpg";
                break;
            case 2:
                console.log("lampu 2 nyala");
                document.getElementById("myImg").src = "lampu1OFF.jpg";
                break;
            case 3:
                console.log("lampu nyala keduanya");
                document.getElementById("myImg").src = "ON.jpg";
                break;
            default:
                break;
        }
    }

}

function bit_clear(num, bit) {
    return num & ~(1 << bit);
}

function bit_set(num, bit) {
    return num | 1 << bit;
}

function write(num, n, i) {
    return i == false ? bit_clear(num, n) : bit_set(num, n);
}


// Called when the disconnection button is pressed
function startDisconnect() {
    client.disconnect();
    document.getElementById("messages").innerHTML = '<span>Disconnected</span><br/>';
}