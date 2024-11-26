import { createStore } from 'vuex';
import user from './modules/user.js';
import board from './modules/board.js';

export default createStore({
    modules : {
        user,
        board,
    },
});