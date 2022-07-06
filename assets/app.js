// any CSS you import will output into a single css file (app.css in this case)
import './styles/app.css';

// start the Stimulus application
import './bootstrap';

import Filter from './modules/Filter'

new Filter(document.querySelector('.js-filter'))
