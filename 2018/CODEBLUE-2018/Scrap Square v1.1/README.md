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
> Source code: [src-v1.1.zip](src/src-v1-f42e8a6276697ea22af97d4d0eabaeb7fe1b7bc8b0a4a61772fcfe8713fdf2de.1.zip)  
> Admin browser (not changed from v1.0): [admin.zip](src/admin-02a631c6efac7c8a14503e8a9ec714a5b4b4ec448b2b4eaf329fbf650fdf092d.zip)

## Keyword
* CSP bypass

## Solution

## Flag
