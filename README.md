This module was built with Magento 2.4.0 for pratice test of Eótica company.

<b>Example POST request for create product seller</b>


http://host/rest/default/V1/productSeller/
<br/>
{
    "productSeller":{
        "name": "Maria João",
        "telephone": "22 92222-2222",
        "product_id": 1
    }
}


<b>Example GET request for list product seller, using criteria search</b>

field = seller_id <br/>
value = 1 <br/>
condition_type = eq <br/>

http://host/rest/default/V1/productSeller/search?searchCriteria[filter_groups][0][filters][0][field]=seller_id&searchCriteria[filter_groups][0][filters][0][value]=1&searchCriteria[filter_groups][0][filters][0][condition_type]=eq
{}

<b>Example PUT request for list product seller, using criteria search</b>

http://host/rest/default/V1/productSeller/:id

{
    "productSeller":{
        "name": "Maria João",
        "telephone": "22 92222-2222",
        "product_id": 1
    }
}


