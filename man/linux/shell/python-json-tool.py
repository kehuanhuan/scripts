#!/usr/bin/python
# -*- coding: UTF-8 -*-

import sys
import json 

arg1 = sys.argv[1]
# 打开文件
fo = open(arg1, "rw+")
print "文件名为: ", fo.name

line = fo.read()
print "读取的字符串: %s" % (line)

# 关闭文件
#jd = json.dumps(line, ensure_ascii=False, encoding='utf-8')
#print jd
#fo.close()
