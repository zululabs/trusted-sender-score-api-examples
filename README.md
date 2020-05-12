# trusted-sender-score-api-examples
 Examples for accessing the Trusted Sender Score API
 
The Trusted Sender Score of a domain is an assessment of a domain's email behaviour and configuration. The score can range from between 0-10, the application programming interface (API) gives developers access to Trusted Sender Score Domain Verification information and associated data that can be used to enhance the reliability of applications that transact uisng email, improve accuracy and response times for email filtering and for the protection of employees against email cyber attack.

## Trusted Sender Score Examples
 - display-scopre.php A simple PHP script that renders ts_score, domain_status, domain_description and statsu_color. It is important to use the colors stipulated and to not do so will be a breach of this license. Uses 
 
 `GETs https://zuluedm.com/api/domain/zululabs.com`

`returns [ { "ts_domain_id": "8426", "ts_score_id": "327", "ts_score": "9.40", "ts_status": "1", "id": "1", "domain_status": "Verified", "domain_description": "This domain is protected and has their email configured to respect subscribers.", "status_color": "#4caf50" }  `

 
 ### Install
 Simply clone the repository 
 `git clone https://github.com/zululabs/trusted-sender-score-api-examples.git'
 
 Run `composer update`
 
 ### links 
 - https://trustedsenderscore.com
 - https://documenter.getpostman.com/view/9652925/SzRz1qEv?version=latest#intro
 
 
