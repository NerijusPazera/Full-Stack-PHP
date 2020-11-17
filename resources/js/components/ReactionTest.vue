<template>
    <div id="test-container">
        <h1 id="text1" class="user-select-none">Reakcijos testas !</h1>
        <h4 id="text2" class="user-select-none">
            Kai raudonas laukas taps žaliu, paspauskite pelės klavišą, kaip įmanoma greičiau.
        </h4>
        <h4 id="text3" class="user-select-none">Kai būsite pasirengęs, paspauskite bet kur.</h4>
    </div>
</template>

<script>
    export default {
        mounted() {
            this.text1 = document.getElementById('text1');
            this.text2 = document.getElementById('text2');
            this.text3 = document.getElementById('text3');
            this.div = document.getElementById('test-container');

            this.div.addEventListener("mousedown", this.onClick);
        },

        methods: {
            onClick() {
                this.text1.innerText = 'Laukite žalios !';
                this.text2.style.display = 'none';
                this.text3.style.display = 'none';
                this.div.style.backgroundColor = '#CE2636';

                this.div.addEventListener("mousedown", this.onClickEarly);

                this.timer = setTimeout(() => {
                    this.showGreen()
                }, Math.floor(Math.random() * 3000) + 1500);

                this.div.removeEventListener("mousedown", this.onClick);
            },

            onClickEarly() {
                clearTimeout(this.timer);
                this.div.style.backgroundColor = '#2B87D1';
                this.text1.innerText = 'Per anksti !';
                this.text2.innerText = 'Nesukčiauk ! Spausk ir bandyk dar kartą.';
                this.text2.style.display = 'block';

                this.div.addEventListener("mousedown", this.onClick);
                this.div.removeEventListener("mousedown", this.onClickEarly);
            },

            showGreen() {
                this.timeStarted = new Date().getTime();
                this.text1.innerText = 'Spauskite !';
                this.div.style.backgroundColor = '#4BDB6A';

                this.div.addEventListener("mousedown", this.onClickGreen);
                this.div.removeEventListener("mousedown", this.onClickEarly);
            },

            onClickGreen() {
                this.timeEnded = new Date().getTime();
                this.reactionTime = (this.timeEnded - this.timeStarted) / 1000;
                this.div.style.backgroundColor = '#2B87D1';
                this.text1.innerText = 'Jūsų reakcijos laikas: ' + this.reactionTime + ' s';
                this.text2.innerText = 'Norėdami pakartoti, spauskite pelės klavišą.';
                this.text2.style.display = 'block';

                this.div.removeEventListener("mousedown", this.onClickGreen);

                this.$api("post", "/test-results", {reaction: this.reactionTime});

                this.div.addEventListener("mousedown", this.onClick);
            },
        }
    }
</script>
