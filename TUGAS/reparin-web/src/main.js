import { createApp } from "vue";
import App from "./App.vue";
import router from "./router";
import "./style.css";
import AOS from "aos";
import "aos/dist/aos.css";
import { themeChange } from "theme-change"; // Tambahkan import ini

const app = createApp(App);
app.use(router);
app.use(AOS.init());

// Tambahkan inisialisasi global untuk theme-change
app.use({
  install: () => {
    themeChange(false);
  },
});

app.mount("#app");
