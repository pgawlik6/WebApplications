//Zmienne globalne
            var GlobalMarkers = [];
            var content = [];
            var toLink = "";
            var count= "0";
            var Allmarkers = [];
            let markers_list = [];
            let address_2 = [];
            let lat = [];
            let lon = [];
            var txt_doc = "";
            var label = 1;
            var duplicates = 0;
            var isXML = 0;
            

            //Inicjalizacja mapy
            function initMap() {
                map = new google.maps.Map(document.getElementById("map"), {
                zoom: 6,
                center: { lat: 52.06465009999999, lng: 21.644 },
                });
                const geocoder = new google.maps.Geocoder();
                
                document.getElementById("submit").addEventListener("click", () => {
                    document.getElementById("gen_XML").innerHTML ="";
                    document.getElementById("gen_link").innerHTML = "";
                    document.getElementById("gen_txt").innerHTML = "";
                    document.getElementById("gen_XML_txt").innerHTML = "";
                    geocodeAddress(geocoder, map);
                });
                document.getElementById("fileInput").addEventListener("click", () => {
                    document.getElementById("gen_XML").innerHTML ="";
                    document.getElementById("gen_link").innerHTML = "";
                    document.getElementById("gen_txt").innerHTML = "";
                    document.getElementById("gen_XML_txt").innerHTML = "";
                    geocodeAddress2(geocoder, map);
                });                
                document.getElementById("fileInput2").addEventListener("click", () => {
                    document.getElementById("gen_XML").innerHTML ="";
                    document.getElementById("gen_link").innerHTML = "";
                    document.getElementById("gen_txt").innerHTML = "";
                    document.getElementById("gen_XML_txt").innerHTML = "";
                    geocodeAddress2(geocoder, map);
                });
            }


            //Funkcja wyszukująca długość i szerokośc geograficzną
            function geocodeAddress(geocoder, resultsMap) {
                const address = document.getElementById("address").value;
                geocoder.geocode({ address: address }, (results, status) => {
                    if (status === "OK") {
                        var i = 0;
                        var str = results[0].geometry.location.toString();
                        duplicates = 0;

                        //Sprawdzenie czy podana miejscowość jest duplikatem
                        while(i<count){
                            if(address_2[i] == results[0].formatted_address){
                                duplicates = 1;
                            }
                            i++;
                        }

                        i = 0;

                        if(duplicates == 0){
                                                    //rozdzielenie długości i szerokości geograficznej oraz tworzenie zawartości pop up'ów
                            while(i<str.length){
                                if(str[i] == ","){
                                    toLink += str.substring(1,i) + "," + str.substring(i+1,str.length -1) + "/";
                                    var addr = results[0].formatted_address;
                                    content[count] = '<div id="content"> <h3 style="text-align:center;">'+ addr + "</h3>" + "<hr/> <b>Długość geograficzna:</b> " + str.substring(1,i) + "<br /><b>Szerokość geograficzna:</b> " + str.substring(i+1,str.length -1) + "</div>";
                                    
                                    address_2[count] = addr;
                                    lon[count] = str.substring(1,i);
                                    lat[count] = str.substring(i+1,str.length -1);
                                    markers_list[count] = addr; 
                                }
                                i++;
                            }

                            //Focusowanie na ostanio dodanej pinezce 
                            resultsMap.setCenter(results[0].geometry.location);
                            
                            //Tworzenie pinezki
                            var markers = new google.maps.Marker({
                                map: resultsMap,
                                label: label.toString(),
                                position: results[0].geometry.location
                            }); 

                            label++;

                            //Dodanie pinezek do zmiennej globalnej
                            GlobalMarkers.push(markers); 
                            
                            //Dodanie kontentu do popup'ów
                            var infowindow = new google.maps.InfoWindow({
                                content: content[count]
                            });
                            
                            //Wyświetlanie popup'ów po kliknięciu na pinezkę
                            markers.addListener("click", () => { 
                                infowindow.open(map, markers);
                            });
                            count++;
                        }else{
                            alert("Miejscowość \"" + results[0].formatted_address + "\" została już dodana");
                        }
                    } 
                    else {
                        if(status == "ZERO_RESULTS"){
                            alert("Wystąpił następujący błąd: brak wyników dla podanego adresu!");
                        }   
                        else if(status == "INVALID_REQUEST"){
                            alert("Wystąpił następujący błąd: nie podano adresu!");
                        } 
                        else if(status == "OVER_QUERY_LIMIT"){
                            alert("Wystąpił następujący błąd: przekroczono limit zapytań  na sekundę!");
                        }  
                        else{
                           alert("Wystąpił następujący błąd: " + status); 
                        }
                    }
                    
                });
            }


            //Jeśli adres nie jest duplikatem to utwórz plik XML lub TXT
            if(duplicates == 0){
                //Zmienne potrzebne do importowania XML'a i TXT
                var text2 = "";
                var add = "";
                var splitted_text = [];
                var openFile = function(event) {
                    var input = event.target;
                    var text = "";
                    var reader = new FileReader();
                    var onload = function(event) {
                        text = reader.result;
                        //Jeśli XML
                        if(text[0] == "<"){
                            isXML = 1;
                            parseFile(text);
                        }
                            
                        else{
                            isXML = 0;
                            text_splitter(text);
                        }
                    };
                    reader.onload = onload;
                    reader.readAsText(input.files[0]);
                };
                

                //Parsowanie pliku XML
                var parseFile = function(text) {
                    var xmlDoc = $.parseXML(text),
                    $xml = $(xmlDoc),
                    $address = $xml.find("address");
                    add = $address;
                }
            }

            
            //Funkcja dzieląca tekst i przypisująca go do tablicy
            function text_splitter(string){
                var tmp = 0;
                var counter = 0;
                for(var j = 0; j < string.length; j++ ){
                    if(string[j] == "\n"){
                        splitted_text[counter] = string.substring(tmp,j);
                        tmp = j;
                        counter++;
                    }
                }
                if(string.endsWith("")){
                    splitted_text[counter] = string.substring(tmp,string.length);
                    tmp = j;
                    counter++;
                }
            }


            //Funkcja służąca do zatrzymania wyszukiwania
            function sleep(ms) {
                return new Promise(resolve => setTimeout(resolve, ms));
            }


            //Funkcja wyszukująca długość i szerokośc geograficzną z pliku XML i TXT
            async function geocodeAddress2(geocoder, resultsMap) {      
                var doc_len = 0;

                //Sprawdzenie rodzaju dokumentu
                if(isXML == 1){
                        doc_len = add.length;
                    }
                    else{
                        doc_len = splitted_text.length;
                }

                for(var j = 0; j < doc_len; j++){
                    await sleep(500);
                    let address = "";
                    if(isXML == 1){
                        address = xml_to_string(add[j]);
                    }
                    else{
                        address = splitted_text[j];
                    }
                        

                    geocoder.geocode({ address: address }, (results, status) => {
                        if (status === "OK") {
                            var i = 0;
                            var str = results[0].geometry.location.toString();
                            duplicates = 0;

                            //Sprawdzenie czy podana miejscowość jest duplikatem
                            while(i<count){
                                if(address_2[i] == results[0].formatted_address){
                                    duplicates = 1;
                                }
                                i++;
                            }
                            
                            i = 0;

                            if(duplicates == 0){
                                //rozdzielenie długości i szerokości geograficznej oraz tworzenie zawartości pop up'ów
                                while(i<str.length){
                                    if(str[i] == ","){
                                        toLink += str.substring(1,i) + "," + str.substring(i+1,str.length -1) + "/";
                                        var addr = results[0].formatted_address;
                                        content[count] = '<div id="content"> <h3 style="text-align:center;">'+ addr + "</h3>" + "<hr/> " + "<b>Długość geograficzna:</b> " + str.substring(1,i) + "<br /><b>Szerokość geograficzna:</b> " + str.substring(i+1,str.length -1) + "</div>";
                                        
                                        address_2[count] = addr;
                                        lon[count] = str.substring(1,i);
                                        lat[count] = str.substring(i+1,str.length -1);
                                        markers_list[count] = addr; 
                                    }
                                    i++;
                                }

                                //Focusowanie na ostanio dodanej pinezce 
                                resultsMap.setCenter(results[0].geometry.location);
                                
                                //Tworzenie pinezki
                                var markers = new google.maps.Marker({
                                    map: resultsMap,
                                    label: label.toString(),
                                    position: results[0].geometry.location
                                });

                                label++;

                                //Dodanie pinezek do zmiennej globalnej
                                GlobalMarkers.push(markers); 

                                //Tworzenie pop up'ów
                                var infowindow = new google.maps.InfoWindow({
                                    content: content[count]
                                });
                                markers.addListener("click", () => { 
                                    infowindow.open(map, markers);
                                });

                                count++;
                            }else{
                                alert("Miejscowość \"" + results[0].formatted_address + "\" została już dodana");
                            }
                        } 
                        else {
                            if(status == "ZERO_RESULTS")
                                alert("Wystąpił następujący błąd: brak wyników dla podanego adresu!");
                            else if(status == "INVALID_REQUEST")
                                alert("Wystąpił następujący błąd: nie podano adresu!");
                            else if(status == "OVER_QUERY_LIMIT"){
                                alert("Wystąpił następujący błąd: przekroczono limit zapytań na sekundę!");
                            }  
                            else
                                alert("Wystąpił następujący błąd: " + status);
                        }                       
                    });
                }
            }

            //Funkcja usuwająca pinezki
            function DeleteMarkers() {
                for (i = 0; i < GlobalMarkers.length; i++) {
                    if (GlobalMarkers[i].getMap() != null) GlobalMarkers[i].setMap(null);
                }
                GlobalMarkers = [];
                content = [];
                count = "0";
                markers_list = [];
                address_2 = [];
                lat = [];
                lon = [];
                toLink = "";
                txt_doc = "";
                label = 1;
                document.getElementById("gen_XML").innerHTML ="";
                document.getElementById("gen_XML_txt").innerHTML ="";
                document.getElementById("gen_link").innerHTML = "";
                document.getElementById("gen_txt").innerHTML = "";
                document.getElementById("xml").innerHTML = "";
            }


            //Funkcja generująca XML'a
            function GenerateXML(){
                var doc = document.implementation.createDocument("", "", null);
                var markers = doc.createElement("markers");
                var marker = [];
                var i = 0;
                while(i < count){
                    marker[i] = doc.createElement("marker");
                    var address = doc.createElement("address");
                    var longitude = doc.createElement("longitude");
                    var latitude  = doc.createElement("latitude");
                    var tmp = "";
                    marker[i].setAttribute("id",i+1);
                    
                    //Przypisanie danych do XML'a
                    address.innerHTML = address_2[i];
                    longitude.innerHTML = lon[i];
                    latitude.innerHTML = lat[i];

                    markers.appendChild(marker[i]);
                    marker[i].appendChild(address);
                    marker[i].appendChild(longitude);
                    marker[i].appendChild(latitude);
                    i++;
                }
                doc.appendChild(markers);
                //Do testów
                //alert(xml_to_string(doc));
                //document.getElementById("xml").innerHTML = xml_to_string(doc).toString();

                //Generowanie linku z plikiem XML do pobrania
                if(xml_to_string(doc) == "<markers/>"){
                    alert("Link z plikiem XML nie może zostać wygenerowany, ponieważ nie podano żadnych adresów");
                }else{
                    var retVal = confirm("Czy chcesz pobrać plik XML?");
                    if( retVal == true ) {
                        let a = document.createElement('a');
                        var data = new Blob([xml_to_string(doc).toString()], {type: 'text/plain'});
                        var url = window.URL.createObjectURL(data);
                        a.href = url;
                        a.download = "miasta.xml";
                        document.body.appendChild(a)
                        a.click()
                        document.body.removeChild(a)
                        return true;
                    } else {
                        return false;
                    }
                   /* document.getElementById("gen_XML_txt").innerHTML = "Wygenerowany link z plikiem XML: ";
                    document.getElementById("gen_XML").innerHTML = "plik XML";
                    var data = new Blob([xml_to_string(doc).toString()], {type: 'text/plain'});
                    var url = window.URL.createObjectURL(data);
                    document.getElementById("gen_XML").href = url;
                    document.getElementById("gen_XML").download = "miasta.xml";*/
                }
            }

            //Generowanie Linku
            function GenerateLink(){

                if(toLink == ""){
                    alert("Link nie może zostać wygenerowany, ponieważ nie podano żadnych adresów");
                }else{
                    document.getElementById("gen_txt").innerHTML = "Wygenerowany link:";
                    document.getElementById("gen_link").innerHTML = "https://www.google.com/maps/dir/" + toLink;
                    document.getElementById("gen_link").href = "https://www.google.com/maps/dir/" + toLink;
                }

            }

            //Generacja pliku TXT
            function GenerateTXT(){
                var i = 0;
                while(i < count-1){
                    txt_doc += address_2[i] + "\n";
                    i++;
                }
                txt_doc += address_2[i];
                //Do testów
                //alert(xml_to_string(doc));
                //document.getElementById("xml").innerHTML = xml_to_string(doc).toString();

                //Generowanie linku z plikiem XML do pobrania
                if(txt_doc == "undefined"){
                    alert("Link z plikiem TXT nie może zostać wygenerowany, ponieważ nie podano żadnych adresów");
                    txt_doc = "";
                }else{
                    var retVal = confirm("Czy chcesz pobrać plik TXT?");
                    if( retVal == true ) {
                        let a = document.createElement('a');
                        var data = new Blob([txt_doc], {type: 'text/plain'});
                        var url = window.URL.createObjectURL(data);
                        a.href = url;
                        a.download = "miasta.txt";
                        document.body.appendChild(a)
                        a.click()
                        document.body.removeChild(a)
                    }
                }
            }

            //Funkcja konwertująca XML'a na string'a
            function xml_to_string(xml_node)
            {
                if (xml_node.xml)
                    return xml_node.xml;
                else if (XMLSerializer)
                {
                    var xml_serializer = new XMLSerializer();
                    return xml_serializer.serializeToString(xml_node);
                }
                else
                {
                    alert("BŁĄD: Zbyt stara przeglądarka");
                    return "";
                }
            }

            //Funkcja scrollująca do góry
            $(document).ready(function() {
                
                var btn = $('#top');

                $(window).scroll(function() {
                    if ($(window).scrollTop() > 300) {
                        btn.addClass('show');
                    } else {
                        btn.removeClass('show');
                    }
                });

                btn.on('click', function(e) {
                    e.preventDefault();
                    $('html, body').animate({scrollTop:0}, '300');
                });

            });

                        
            //Funkcja scrollująca do góry
            $(document).ready(function() {
                
                var btn = $('#fileInput');

                $(window).scroll(function() {
                    if ($(window).scrollTop() > 300) {
                        btn.addClass('show');
                    } else {
                        btn.removeClass('show');
                    }
                });

                btn.on('click', function(e) {
                    e.preventDefault();
                    $('html, body').animate({scrollTop:0}, '300');
                });

            });

            
            //Funkcja scrollująca do góry
            $(document).ready(function() {
                
                var btn = $('#fileInput2');

                $(window).scroll(function() {
                    if ($(window).scrollTop() > 300) {
                        btn.addClass('show');
                    } else {
                        btn.removeClass('show');
                    }
                });

                btn.on('click', function(e) {
                    e.preventDefault();
                    $('html, body').animate({scrollTop:0}, '300');
                });

            });
            

            //Funkcja scrollująca na dół
            $(document).ready(function() {
                
                var btn = $('#but_gen_table');
                

                $(window).scroll(function() {
                    if ($(window).scrollTop() > 300) {
                        btn.addClass('show');
                    } else {
                        btn.removeClass('show');
                    }
                });

                btn.on('click', function(e) {
                    e.preventDefault();
                    $('html, body').animate({scrollTop:1100}, '300');
                });

            });

             //Funkcja scrollująca na dół
             $(document).ready(function() {
                
                var btn = $('#but_gen');

                $(window).scroll(function() {
                    if ($(window).scrollTop() > 300) {
                        btn.addClass('show');
                    } else {
                        btn.removeClass('show');
                    }
                });

                btn.on('click', function(e) {
                    e.preventDefault();
                    $('html, body').animate({scrollTop:500}, '300');
                });
            
            });

            //Generowanie tabeli
            function GenerateTable(){
                document.getElementById("xml").innerHTML = "";
                let html = "";

                for(var i = 0; i < address_2.length; i++){
                    if(i == 0){
                       html += "<h1 style=\"text-align:center\">Wybrane adresy:</h1>"+
                            "<table style=\"width:100%\">" +
                                    "<thead>"+
                                        "<tr>" + 
                                            "<th>Nr</th>" + 
                                            "<th>Adres</th>" + 
                                            "<th>Szerokość geograficzna</th>" +
                                            "<th>Długość geograficzna</th>"+
                                        " </tr>" +
                                    "</thead>" +
                                    "<tbody>"+
                                        "<tr>" + 
                                            "<td>"+ (i+1) + "</td>" + 
                                            "<td>" + address_2[i] + "</td>" + 
                                            "<td>" + lat[i] + "</td>" + 
                                            "<td>" + lon[i] + "</td>" +
                                        "</tr>";
                    }
                    else{
                        html += "<tr>" + 
                                    "<td>"+ (i+1) + "</td>" + 
                                    "<td>" + address_2[i] + "</td>" + 
                                    "<td>" + lat[i] + "</td>" + 
                                    "<td>" + lon[i] + "</td>" +
                                "</tr>";
                    }
                }

                html += "</tbody> </table>";

                document.getElementById("xml").innerHTML = html;
            }