# news-management
Users : Login , Regiseter , CRUD news


Admin : Login , CRUD categories , accept news

DB : 
User('id ','name','email','password','email_verified_at','status','created_at','updated_at','remember_token')
Categories('id','name','created_at','updated_at')
News('id','title','content','thumb','id_category','id_users','status','created_at','updated_at')


Users: status = 1 => admin ,

        status = 0 => users
        
News : status = 0 => Chưa duyệt,

      status = 1 => đã duyệt
