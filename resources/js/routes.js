import Welcome from "./views/user/Welcome";
import Blog from "./views/user/pages/Blog";

export default {
    mode: "history",
    linkActiveClass: "active fw-bold",

    routes: [{ path: "/", name: "Welcome", component: Welcome, props: true }],
    routes: [{ path: "/blog", name: "Blog", component: Blog, props: true }],
};
