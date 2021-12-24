import openpyxl
import pymysql
import csv

conn=pymysql.connect(host='localhost',user='root',password='apmsetup',db='project_db',charset='utf8')
curs=conn.cursor()
sql="insert into table_write (press,author,date,sentiment,title,paragraph) values (%s,%s,%s,%s,%s,%s)"

#select press,author_no,date,title from table_author,table_write where author_name=author


f=open('merge_allnews_c.csv','r',encoding='latin_1')
rd=csv.reader(f)
'''
for line in rd:
    #curs.excute(sql,(line[]))
    print(line)
    

    curs.execute((sql,(line[0],line[1],line[2],line[3],line[4],line[5])))
'''
curs.executemany(sql,rd)
conn.commit()
conn.close()
f.close()



