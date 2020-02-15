


## Database Setup

To merge table over to the database named "projecta", use the command <strong>php artisan merge</strong>.

Use the command <strong> php artisan db:seed </strong> to run the seeders, this will insert data to the database tables.

## Admin Endpoints
-To create new city, a POST to <strong> \api\cities </strong> with a given data name as the name of the city, Example : 

`{
	"name": "Casa"
}`

-To create new delivery time, a POST to <strong> /api/delivery-times </strong> with data that represents the delivery time on a day, Example : 
`{
	"delivery_at": "9->12"
}`

-To attache delivery-times to a city, a POST to <strong> /api/cities/{city_id}/delivery-times </strong> with the delivery_ids given on a list of IDs, Example :

`{
	"delivery_times": [1,2]
}`

- To exclude delivery times from a given city in a given time span, a POST to <strong> exclude/{city_id} </strong> with data given of the starting day and ending day of the holiday for example, with a list of delivery_ids to exclude, the full period will be excluded if no delivery_ids are specified. Example :

`{
	"start_day": "2020-02-15",
	"end_day": "2020-02-17",
	"delivery_id": [1,2]
}`

## User Endpoints

- While sending a GET to <strong> cities/{city_id}/delivery_dates_times/{number_of_days} </strong> with the city_id as the city selected, and the number_of_days is the number of days to show starting today, The data returns a JSON file as follow : 

for example we send the GET to : <Strong>api/cities/2/delivery_dates_times/4</strong>.

`
{
    "data":
 [`
    
        {
        
            "day": "2020-02-15",
            
            "delivery_at": [
            
                "10->13"
                
            ]
            
        },
        
        {
        
            "day": "2020-02-16",
            
            "delivery_at": [
            
                "10->13"
                
            ]
            
        },
        
        {
        
            "day": "2020-02-17",
            
            "delivery_at": [
            
                "10->13"
                
            ]
            
        },
        
        {
        
            "day": "2020-02-18",
            
            "delivery_at": [
            
                "10->13",
                
                "15->19"
                
            ]
            
        }
        
    ]
    
`
}
`
