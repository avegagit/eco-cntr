<template>
    <div id="map" class="contacts-iframe pb-40">

    </div>
</template>

<script>
import "../plugins/yandex-maps";

export default {
    props: {
        options: {
            type: Object,
            required: true
        }
    },
    data() {
        return {};
    },
    mounted() {
        //загрузка API и готовности дом
        ymaps.ready(this.init);
    },
    methods: {
        init() {
            let myMap, myPlacemark;
            myMap = new ymaps.Map("map", {
                    center: [this.$props.options.map_lat, this.$props.options.map_lon],
                    zoom: 16,
                    //controls: ['smallMapDefaultSet']
                    controls: ['zoomControl',  'fullscreenControl',],
                },
                {suppressMapOpenBlock: true}
            );
            myPlacemark = new ymaps.Placemark([this.$props.options.map_lat, this.$props.options.map_lon], {
                    balloonContent: 'ул. Красный путь, 103, офис 48',
                    iconCaption: 'ул. Красный путь, 103, офис 48'
                },
                {
                    preset: 'islands#greenDotIconWithCaption',
                    iconColor: '#849422'
                });
            myMap.geoObjects
                .add(myPlacemark);
        }
    }
};
</script>