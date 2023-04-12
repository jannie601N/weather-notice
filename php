<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <title>날씨 정보</title>
</head>
<body>
    <h1>날씨 정보</h1>
    <form>
        <label for="city">도시:</label>
        <input type="text" id="city" name="city"><br><br>
        <button type="button" onclick="getWeather()">조회</button>
    </form>
    <div id="weather"></div>

    <script>
        // API 주소
        const apiAddress = 'https://api.openweathermap.org/data/2.5/weather?appid=YOUR_API_KEY&units=metric&q=';

        // API 호출
        function getWeather() {
            const city = document.getElementById('city').value;
            const url = apiAddress + city;
            fetch(url)
                .then(response => response.json())
                .then(data => {
                    const weatherDiv = document.getElementById('weather');
                    weatherDiv.innerHTML = `도시: ${data.name}<br>온도: ${data.main.temp}℃<br>상태: ${data.weather[0].description}`;
                })
                .catch(error => console.error(error));
        }
    </script>
</body>
</html>
