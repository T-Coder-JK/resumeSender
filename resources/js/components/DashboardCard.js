import React from 'react';


function DashboardCard (prop){
    return(
        <div className={'data-card data-card-'+ prop.type}>
            <Header icon={prop.icon} title={prop.title}/>
            {(()=>{
                switch (prop.type){
                    case 'application': return<ApplicationCard/>;
                    case 'ongoing-application': return<OngoingCard/>;
                    case 'message': return<ReplyMessage/>;
                    case 'interview': return<Interview/>;
                    default: return null;
                }
            })()}
        </div>
    );
}


const Header = ({icon, title}) =>(
    <div className='data-card-header align-items-center'>
        <span className='card-header-icon'>
            <img src={'/images/SVG/dashboard/card_'+icon+'.svg'}/>
        </span>
        <span className='card-header-title'>
            {title}
        </span>
    </div>
    );


const ApplicationCard = ()=>(
    <div className='applied-content'>
        <div className='applied-num'>
            <a src=''>15</a>
        </div>
        <div className="last-time">
            <span>Latest:  March 10th 2020</span>
        </div>
    </div>
);

const OngoingCard = ()=>(
    <div>
        <div className='applied-num'>
            <a src=''>2</a>
        </div>
        <div className="last-time">
            <span>Latest Modified:  March 10th 2020</span>
        </div>
    </div>
);

const ReplyMessage = ()=>(
    <div>
        <div className='applied-num'>
            <a src=''>0</a>
        </div>
        <div className="last-time">
            <span>Latest:  March 10th 2020</span>
        </div>
    </div>
);

const Interview = ()=>(
    <div>
        <div className='applied-num'>
            <a src=''>1</a>
        </div>
        <div className="last-time">
            <span>Next:  March 10th 2020</span>
        </div>
    </div>
);


export default DashboardCard;
