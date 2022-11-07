<?php
namespace App\Http\Controllers;
use App\Http\Controllers;
use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator ;
use App\Http\Controllers\datatables;

class EmployeeController extends Controller
{
    public function index()
    {

        $employee=Employee::all();

        $employee = Employee::orderBy('id', 'desc')->get();
       return view('employee.list')->with(['employee'=>$employee]);
    }
    public function create()
    {
        //dd("abc");
        return view('employee.create');
    }
    public function store(Request $request)
    {
        // $validator = Validator::make($request->all(), [
        //     'firstname' =>  'required',
        //      'lastname' =>  'required',
        //      'email'   =>  'required',         
        //       'address' =>  'required',
        //      'gender' =>  'required',
        //      'branch' =>  'required',  
        //      'hobby'  =>  'required',   
        //      'image' =>   'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',    

        // ]);

        // $input = $request->all();
  
        // if ($image = $request->file('image')) {
        //     $destinationPath = 'C:\xampp\htdocs\project5\public\images';
        //     $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
        //     $image->move($destinationPath, $profileImage);
        //     $input['image'] = "$profileImage";
        // }
    
        // Employee::create($input);

        
         $request->validate([
        
             'firstname' =>  'required',
           'lastname' =>  'required',
             'email'   =>  'required',         
              'address' =>  'required',
             'gender' =>  'required' ,
              'branch' =>  'required',  
              'hobby'  =>  'required',   
              'image' =>   'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            
         ]);
        if($request->image){
            $ext=$request->image->getClientOriginalExtension();
            $newFileName= time().'.'.$ext;
            $request->image->move(public_path().'/uploads/employees/',$newFileName);
            $request->image=$newFileName;

        }
        Employee::create($request->all());


    //     $input = $request->all();
  
    //     if ($image = $request->file('image')) {
    //        $destinationPath = '/images/20221103060352.gif';
    //        $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
    //        $image->move($destinationPath, $profileImage);
    //        $input['image'] = "$profileImage";
    //       }
  
    //    Employee::create($input);
 
 





        // $requestData= $request->all()
       // $file_name = time() . '.' . request()->(image)->getClientOriginalExtension();

        //request()->image->move(public_path('images'), $file_name);

        //$employee=new Employee();
        
         
        //$employee->file($request->post())->save();
       
        // $employee->firstname = $request-> firstname;
        // $employee->lastname = $request-> lastname;
        // $employee->email = $request-> email;
        // $employee->address = $request-> address;
        // $employee->gender = $request-> gender;
        // $employee->branch = $request-> branch;
        // $employee->hobby = $request-> hobby;
        // $employee->image = $request-> image;
        // //dd($employee);
        // $employee->save();
        

    {  

        return redirect()->route('employees.index')->with('success', 'Student Added successfully.');
    }


    }
    public function show()
    {
        
        return view('employee.list', compact('employee'));
    }
    public function edit($id)
    {
        $employee=Employee::findOrFail($id);
     
        //dd($employee);

        return view('employee.edit',['employee'=>$employee]);


        //dd($employee->all());
        //$employee=Employee::all();
        //return view('employee.edit')->with(['employee'=>$employee]);
        //return view('edit', compact('employee'));
    }
    public function update(Request $request ,Employee $employee)
    {
        $request->validate([
         
         'firstname' =>  'required',
         'lastname' =>  'required',
         'email'   =>  'required',         
         'address' =>  'required',
         'gender' =>  'required',
         'branch' =>  'required',  
         'hobby'  =>  'required',   
         'image' =>  'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
         
     ]);


     $input = $request->all();
  
     if ($image = $request->file('image')) {
         $destinationPath = '\images';
         $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
         $image->move($destinationPath, $profileImage);
         $input['image'] = "$profileImage";
     }else{
         unset($input['image']);
     }
       
     $employee->update($input);
 
     //return redirect()->route('employee.index')
                    // ->with('success','student updated successfully');
 
     

     //$file_name = time() . '.' . request()->image->getClientOriginalExtension();

    // request()->image->move(public_path('images'), $file_name);

    // $employee=Employee::find($id);
     //$employee->file($request->post())->save();
     
    //  $employee->firstname = $request-> firstname;
    //  $employee->lastname = $request-> lastname;
    //  $employee->email = $request-> email;
    //  $employee->address = $request-> address;
    //  $employee->gender = $request-> gender;
    //  $employee->branch = $request-> branch;
    //  $employee->hobby = $request-> hobby;
    //  $employee->image = $request-> image;
      //$employee->save();

{  

     return redirect()->route('employees.index')->with('success', 'Student update successfully.');
 }


 }   
    public function destroy($id)
    {
        //dd($id);
        $employee=Employee::findOrFail($id);
        
        $employee->delete();
      
      return redirect()->route('employees.index')->with('success', 'Student Data deleted successfully');
    }
    public function test($id)
    {
        dd("anju");
    }

}
    


