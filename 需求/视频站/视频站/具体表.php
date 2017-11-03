视频存储数据库设计：

1.临时表， 保存数据源信息，待下载完之后，删除此行记录                                  

2.下载表， 视频表【保存视频基本信息】 

3.视频扩展表

4.视频评论表

5.视频分类表





1.视频信息源表
  | Field          | Type         | Null | Key | Default | Extra          |
+----------------+--------------+------+-----+---------+----------------+
| id             | int(11)      | NO   | PRI | NULL    | auto_increment |
| video_url      | varchar(100) | NO   |     |         |                |
| down_url       | varchar(100) | NO   |     |         |                |
| video_title    | varchar(255) | NO   |     |         |                |
| video_cover    | varchar(255) | YES  |     | NULL    |                |
| cat_id         | tinyint(2)   | NO   |     | 2       |                |
| type_id        | tinyint(2)   | YES  |     | 1       |                |



2.视频表
| Field              | Type         | Null | Key | Default | Extra          |
+--------------------+--------------+------+-----+---------+----------------+
| id                 | int(11)      | NO   | PRI | NULL    | auto_increment |
| you_id             | int(11)      | NO   |     | 0       |                |
| video_title        | varchar(255) | NO   |     | 0       |                |
| image_path         | varchar(200) | NO   |     |         |                |
| img_upload         | tinyint(1)   | NO   |     | 0       |                |
| video_path         | varchar(200) | NO   |     |         |                |
| video_upload       | tinyint(1)   | NO   |     | 0       |                |
| sort               | int(11)      | NO   |     | 0       |                |
| video_time_content | varchar(100) | NO   |     | 0       |                |
| status             | tinyint(3)   | NO   |     | 1       |                |
| cat_id             | tinyint(2)   | NO   |     | 2       |                |
| type_id            | tinyint(2)   | YES  |     | 1       |                | 
| add_time           | int(11)      | NO   |     | 0       |                |




3.视频扩展表
| Field              | Type         | Null | Key | Default | Extra          |
+--------------------+--------------+------+-----+---------+----------------+
| id                 | int(11)      | NO   | PRI | NULL    | auto_increment |
| down_id            | varchar(255) | NO   |     | 0       |                |
| play_duration      | varchar(50)  | NO   |     | 0       |                |
| playback_times     | char(11)     | NO   |     | 0       |                |
| video_time_content | varchar(100) | NO   |     | 0       |                |
| status             | tinyint(3)   | NO   |     | 1       |                |
  喜欢次数，
  播放次数，
  评论次数
+--------------------+--------------+------+-----+---------+----------------+

