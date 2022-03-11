<template>    
    <div class="mt-3">
        <div class="mx-auto justify-content-center weather-container">
            
            <h1 class="mb-2">Weather Forecast Summary</h1>
            <img class="card-img-top mb-2 rounded" src="data:image/svg+xml;charset=UTF-8,%3Csvg%20width%3D%22286%22%20height%3D%22180%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20viewBox%3D%220%200%20286%20180%22%20preserveAspectRatio%3D%22none%22%3E%3Cdefs%3E%3Cstyle%20type%3D%22text%2Fcss%22%3E%23holder_17f7021a462%20text%20%7B%20fill%3Argba(255%2C255%2C255%2C.75)%3Bfont-weight%3Anormal%3Bfont-family%3AHelvetica%2C%20monospace%3Bfont-size%3A14pt%20%7D%20%3C%2Fstyle%3E%3C%2Fdefs%3E%3Cg%20id%3D%22holder_17f7021a462%22%3E%3Crect%20width%3D%22286%22%20height%3D%22180%22%20fill%3D%22%23777%22%3E%3C%2Frect%3E%3Cg%3E%3Ctext%20x%3D%2299.12312316894531%22%20y%3D%2296.3%22%3EImage%20cap%3C%2Ftext%3E%3C%2Fg%3E%3C%2Fg%3E%3C%2Fsvg%3E" alt="Card image cap">
            <div class="row">
                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 col-xs-6 my-3">
                    <div class="card">
                        <div class="card-body border border-secondary rounded">
                            <div class="text-center">
                                <div class="location-box">
                                    <div class="h1">Test</div>
                                    <div class="h3">Test</div>
                                </div>
                                <div class="weather-box">
                                    <div class="h3 text-secondary">10 °c</div>
                                    <div class="h3">Cloudy </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-8 col-lg-8 col-md-8 col-sm-6 col-xs-6 my-3">
                    <div class="card">
                        <div class="card-body border border-secondary rounded">
                            <div class="card-title">
                                Upcoming Weather Forecast
                            </div>
                            <table class="table">
                                <tr>
                                    <td>Test</td>
                                    <td>Test</td>
                                    <td>Test</td>
                                    <td>Test</td>
                                </tr>
                                <tr>
                                    <td>Test</td>
                                    <td>Test</td>
                                    <td>Test</td>
                                    <td>Test</td>
                                </tr>
                                <tr>
                                    <td>Test</td>
                                    <td>Test</td>
                                    <td>Test</td>
                                    <td>Test</td>
                                </tr>                                
                                <tr>
                                    <td>Test</td>
                                    <td>Test</td>
                                    <td>Test</td>
                                    <td>Test</td>
                                </tr>                                
                                <tr>
                                    <td>Test</td>
                                    <td>Test</td>
                                    <td>Test</td>
                                    <td>Test</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
     name : 'WeatherComponent'
}
</script>

<style scoped>
.weather-container {

    max-width : 800px; 
    width : 100%;
}
</style>