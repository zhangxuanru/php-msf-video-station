后台：
	抓取管理
	   单个抓取
	   单页抓取
	   计划任务抓取

grab_grab_information: 【抓取配置表】

| Field          | Type         | Null | Key | Default | Extra          |
+----------------+--------------+------+-----+---------+----------------+
| id             | int(11)      | NO   | PRI | NULL    | auto_increment  |
| user_id        | int(11)      | NO   |     |         | 用户ID          | 
| video_sort     | tyinyint(1)  | NO   |     |         |  视频分类，1:youtube,2:bilibili |
| grab_address   | varchar(100) | NO   |     |         | 抓取地址        |
| grab_number    | tinyint(2)   | NO   |     | 2       |  设置的抓取数量 |
| type           | tyinyint(1)  | YES  |     | NULL    |  类型[1:单个,2:单页,3:计划任务]  |
| category       | tyinyint(1)  | YES  |     | NULL    |  分类ID；1:搞笑，2：科技，3:计算机|        |
| success_number | tyinyint(1)  | NO   |     |         | 成功的个数     |
| fail_number    | tyinyint(1)  | NO   |     |         | 失败的个数     |
| crontab_info   | varchar(255) | YES  |     | NULL    | 计划任务的配置信息 |
| add_date       | varchar(2)   | YES  |     | 1       |  添加时间      |
| implement_date | varchar(2)   | YES  |     | 1       |  执行时间      |


 
	视频管理
        所有视频列表【youtube, bilibibi,合并视频，删除视频，视频编码,视频封面图，视频插播广告，播放次数，点赞数，视频排序】 
        
分类管理:

grab_category:【分类表】
   id                   1
   category_name        搞笑


 grab_video_category:[视频分类表]  
     id                 1
     categroy_name      youtube


 grab_video_tags:[视频标签表]
    id                 1
    tag_name           搞笑


视频相关表:
       视频源信息表   【grab_video_source】
            id
            url
            download_url
            title
            delogo
            status
            merge
            coord
            type        :   1:youtube,2:bilibili
            createtime


        视频下载表     【grab_video_info】
           id
           source_id
           title
           filename
           sort                   视频排序
           type                   视频分类，对应grab_video_category表ID  1 :youtube,2:bilibili
           category               对应grab_category表的ID
           tags_id                标签集合[对应grab_video_tags表的ID，这里可以是多个集合]
           cover_picture          封面图ID
           img_ids                :图片ID集合 [thumbnail_url,  $info['player_response']['thumbnails']
           like_number            喜欢的次数
           reviews_number         评论的次数 
           view_count             播放次数
           author                 作者
           keywords：             关键字
           length_seconds         播放时长[单位为秒]
           qiniu_upload           是否上传到七牛
           status                 状态，1：正常，0：删除 
           

	用户管理
          后台用户：后台管理权限

          注册用户：禁用登录，删除用户,用户提的下载需求
          
          注册用户表：
       grab_video_user
             id             
             nikename
             username
             passwd 
             status


          下载需求表：
        grab_user_download_info
           id
           user_id
           url
           description
           status
           filename
           qiniu_upload  



        后台用户表
        grab_user_admin
           id
           username
           passwd
           status 

     
     评论管理
          删除评论，手动增加评论 ，评论审核，评论置顶
         
         grab_video_comment
            id
            user_id
            video_id            
            content
            sort       : 置顶时只需要把值设置大一些即可
            status

 

     导航管理：
         添加导航，导航链接，专题页【模板可以手动拖动模块】
     
     网站导航表
       grab_video_nav
          id
          navname
          linkaddress
          is_topic : 是否是专题，如果是专题则实现拖动模块然后生成URl地址
          sort     : 排序
          status   : 状态 

 
 





前台：
   用户：    
      视频下载需要登录
      发表评论需要登录
      上传自己的视频需要登录
      提出有下载需求的需要登录
     

    导航
         读取导航表里的内容


     首页：
         内容读取各个栏目的数据 [把视频分成几个小大类， 首页各读一块类别下的内容]

  
  视频防盗链

        