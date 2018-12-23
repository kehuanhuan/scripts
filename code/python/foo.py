# -*- coding: UTF-8 -*-

def add(a, b):
    return a + b

a = 0xA0F;
b = 0xA;

str =  'oV7Qk0QG1o1YTAKg4lzX6WSZE_F0'

print len(str)

if 'e' not in str[:5]:
    print 'yes'

print ("我叫 %c 今年 %d 岁!" % ('A', 10))


list1 = ['a', 'b', 'c'];

list2 = ['a', 'n', 1];

print min(list1 + list2)

tup1 = (1, 2, 4);

print tup1[0]
print tup1

dict1 = {'Name': 'Runoob', 'Age': 7, 'Class': 'First', 'aa': {'bbb': 'bbb'}}

print (dict1['Name'])
print (dict1['aa']['bbb'])

basket = {'apple', 'orange', 'apple', 'pear', 'orange', 'banana'}

print basket