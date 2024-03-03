@extends('layout')
@section('title')
@endsection
@section('content')
    <div class="w-full p-8 my-4 md:px-12 lg:w-9/12 lg:pl-20 lg:pr-40 mr-auto rounded-2xl shadow-2xl">
        <div class="flex">
            <h1 class="font-bold uppercase text-5xl">Employees <br /> Edit</h1>
        </div>
        <form action="{{ route('updateData', $employee->id) }}" method="POST" enctype="multipart/form-data">
            {{-- การใช้ enctype="multipart/form-data" จำเป็นต้องทำเมื่อคุณมีอิลิเมนต์ <input> ที่กำลังถูกใช้สำหรับการอัปโหลดไฟล์ (type="file")  --}}
            @csrf

            <div class="grid grid-cols-1 gap-5 md:grid-cols-2 mt-5">
                <div>
                    <label for="em_name" class="block text-sm font-medium text-gray-700"></label>
                    <input name="em_name" id="em_name"
                        class="w-full bg-gray-100 text-gray-900 mt-2 p-3 rounded-lg focus:outline-none focus:shadow-outline"
                        type="text" value="{{ $employee->em_name }}" />
                </div>
                <div>
                    <label for="em_email" class="block text-sm font-medium text-gray-700"></label>
                    <input name="em_email" id="em_email"
                        class="w-full bg-gray-100 text-gray-900 mt-2 p-3 rounded-lg focus:outline-none focus:shadow-outline"
                        type="text" value="{{ $employee->em_email }}" />
                </div>
                <div>
                    <label for="em_phone" class="block text-sm font-medium text-gray-700"></label>
                    <input name="em_phone" id="em_phone"
                        class="w-full bg-gray-100 text-gray-900 mt-2 p-3 rounded-lg focus:outline-none focus:shadow-outline"
                        type="text" value="{{ $employee->em_phone }}" />
                </div>
                <div>
                    <label for="em_salary" class="block text-sm font-medium text-gray-700"></label>
                    <input name="em_salary" id="em_salary"
                        class="w-full bg-gray-100 text-gray-900 mt-2 p-3 rounded-lg focus:outline-none focus:shadow-outline"
                        type="number" value="{{ $employee->em_salary }}" />
                </div>
                <div>
                    <label for="em_position" class="block text-sm font-medium text-gray-700"></label>
                    <select name="em_position" id="em_position"
                        class="w-full bg-gray-100 text-gray-900 mt-2 p-3 rounded-lg focus:outline-none focus:shadow-outline">
                        <option value="Full Stack Developer"
                            {{ $employee->em_position == 'Full Stack Developer' ? 'selected' : '' }}>Full Stack Developer
                        </option>
                        <option value="Dev Developer" {{ $employee->em_position == 'Dev Developer' ? 'selected' : '' }}>Dev
                            Developer</option>
                        <option value="Data Engineer" {{ $employee->em_position == 'Data Engineer' ? 'selected' : '' }}>Data
                            Engineer</option>
                    </select>

                </div>
                <div>
                    <label for="em_img" class="block text-sm font-medium text-gray-700"></label>
                    <input name="em_img" id="em_img"
                        class="w-full bg-gray-100 text-gray-900 mt-2 p-3 rounded-lg focus:outline-none focus:shadow-outline"
                        type="file" accept="image/*" />
                </div>
            </div>
            <div class="my-2 w-1/2 lg:w-1/4">
                <button type="submit"
                    class="uppercase text-sm font-bold tracking-wide bg-blue-900 text-gray-100 p-3 rounded-lg w-full 
                              focus:outline-none focus:shadow-outline">
                    Update
                </button>
            </div>
        </form>

    </div>
@endsection
