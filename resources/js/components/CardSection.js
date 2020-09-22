import React from 'react';
import ReactDom from 'react-dom';
import DashboardCard from './DashboardCard';
import '../../../public/css/component/card_section.css';



function CardSection() {
    return(
        <div className='data-card-row'>
            <DashboardCard title='card data 1' type='application' icon='application' />
        </div>
    );
}

if (document.getElementById("card-section")){
    console.log('found');
    ReactDom.render(<CardSection />, document.getElementById("card-section"));
}

