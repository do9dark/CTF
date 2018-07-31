# Scrap Square v1.1

**Description:**
> Kamogawa noticed that if the username is too long, it stuck out from the screen in Scrap Square v1.0.  
> For this reason, he restricted the length of the username more strictly.  
```
-    if (req.body.name.length > 300) {
-      errors.push('Username should be less than 300')
+    if (req.body.name.length > 80) {
+      errors.push('Username should be less than 80')
```
> URL: http://v11.scsq.task.ctf.codeblue.jp:3000/  
> Admin browser: Chromium 69.0.3494.0  
> Source code: [src-v1.1.zip]()  
> Admin browser (not changed from v1.0): [admin.zip]()

## Keyword
* CSP bypass

## Solution

## Flag
