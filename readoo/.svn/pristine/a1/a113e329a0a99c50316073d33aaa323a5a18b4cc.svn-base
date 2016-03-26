<?php

	//微信组队 放redis的key
    define('USERTYPECOUNT' , 'user_type_count');    //存储用户签到数、随笔数等的key    加入格式：hset(key, user_id, json数据);
    define('GROUPUSER' , 'group_users_');     		//一个群组里的所有用户排名		  加入格式：zadd(key.$group_id, 得分, user_id);
    define('GROUPSORT' , 'grouplist');    			//所有群组排名key  		加入格式：zadd(key, 得分, group_id)
    
    //user相关key
    define('USER', 'rw:userinfo');          
    
?> 